<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\CtvProfile;
use App\Models\CtvSchedule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Admin CTV Controller — Management-side endpoints.
 *
 * All routes are protected by the existing 'auth:admin' middleware.
 */
class AdminCtvController extends Controller
{
    /**
     * Slot-to-day mapping helper.
     * Returns the day abbreviation for a given slot string.
     */
    private function slotToDay(string $slot): ?string
    {
        $map = [
            'Mon' => 'Mon', 'Tue' => 'Tue', 'Wed' => 'Wed',
            'Thu' => 'Thu', 'Fri' => 'Fri', 'Sat' => 'Sat', 'Sun' => 'Sun',
        ];

        $prefix = explode('_', $slot)[0] ?? null;

        return $map[$prefix] ?? null;
    }

    /**
     * Slots per day constant (Morning, Afternoon, Evening).
     */
    private const SLOTS_PER_DAY = 3;

    // ──────────────────────────────────────────────
    //  GET /api/admin/ctv/stats?week_key=YYYY-WW
    // ──────────────────────────────────────────────

    /**
     * Aggregated statistics for charts:
     *
     * 1) Bar Chart  – Total free hours of the entire team per day (Mon → Sun).
     * 2) Pie Chart  – Total free hours comparison: NEW group vs SENIOR group.
     *
     * Free-hour formula:
     *   NEW    → T_free = count(slots)
     *   SENIOR → T_free = 21 - count(slots)
     */
    public function stats(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'week_key' => ['required', 'string', 'regex:/^\d{4}-\d{2}$/'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid week_key format. Expected YYYY-WW.',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $weekKey = $request->input('week_key');

        // Load all CTV profiles with their schedule for this week
        $profiles = CtvProfile::with(['schedules' => function ($q) use ($weekKey) {
            $q->where('week_key', $weekKey);
        }])->get();

        // ── Initialize accumulators ──────────────────────────
        $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
        $barChart = array_fill_keys($days, 0);   // free hours per day
        $pieChart = ['NEW' => 0, 'SENIOR' => 0]; // free hours by group

        foreach ($profiles as $profile) {
            $schedule  = $profile->schedules->first();
            $slots     = $schedule ? ($schedule->slots ?? []) : [];
            $slotCount = count($slots);

            if ($profile->level === 'NEW') {
                // NEW: slots represent FREE time
                $totalFree = $slotCount;

                // Bar chart: count free slots per day
                foreach ($slots as $slot) {
                    $day = $this->slotToDay($slot);
                    if ($day) {
                        $barChart[$day]++;
                    }
                }
            } else {
                // SENIOR: slots represent BUSY time, free = 21 - busy
                $totalFree = CtvProfile::TOTAL_SLOTS_PER_WEEK - $slotCount;

                // Bar chart: for SENIOR, free slots = ALL slots minus busy ones
                $busyDays = [];
                foreach ($slots as $slot) {
                    $day = $this->slotToDay($slot);
                    if ($day) {
                        $busyDays[$day] = ($busyDays[$day] ?? 0) + 1;
                    }
                }

                foreach ($days as $day) {
                    $busyCount = $busyDays[$day] ?? 0;
                    $barChart[$day] += (self::SLOTS_PER_DAY - $busyCount);
                }
            }

            $pieChart[$profile->level] += $totalFree;
        }

        // ── Format bar chart as ordered array ────────────────
        $barChartData = [];
        foreach ($days as $day) {
            $barChartData[] = [
                'day'        => $day,
                'free_hours' => $barChart[$day],
            ];
        }

        return response()->json([
            'success'  => true,
            'week_key' => $weekKey,
            'data'     => [
                'bar_chart' => $barChartData,
                'pie_chart' => [
                    ['group' => 'NEW',    'free_hours' => $pieChart['NEW']],
                    ['group' => 'SENIOR', 'free_hours' => $pieChart['SENIOR']],
                ],
                'summary'   => [
                    'total_ctv'        => $profiles->count(),
                    'total_new'        => $profiles->where('level', 'NEW')->count(),
                    'total_senior'     => $profiles->where('level', 'SENIOR')->count(),
                    'total_free_hours' => $pieChart['NEW'] + $pieChart['SENIOR'],
                ],
            ],
        ]);
    }

    // ──────────────────────────────────────────────
    //  GET /api/admin/ctv/export-data?week_key=YYYY-WW
    // ──────────────────────────────────────────────

    /**
     * Exportable CTV list for a given week.
     *
     * Returns: Name, Email (from users), Role (level), Total Free Hours.
     */
    public function exportData(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'week_key' => ['required', 'string', 'regex:/^\d{4}-\d{2}$/'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid week_key format. Expected YYYY-WW.',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $weekKey = $request->input('week_key');

        $profiles = CtvProfile::with([
            'user:id,name,email',
            'schedules' => function ($q) use ($weekKey) {
                $q->where('week_key', $weekKey);
            },
        ])->get();

        $exportData = $profiles->map(function (CtvProfile $profile) use ($weekKey) {
            $schedule  = $profile->schedules->first();
            $slots     = $schedule ? ($schedule->slots ?? []) : [];
            $slotCount = count($slots);

            $freeHours = $profile->level === 'SENIOR'
                ? CtvProfile::TOTAL_SLOTS_PER_WEEK - $slotCount
                : $slotCount;

            return [
                'name'             => $profile->user->name  ?? '—',
                'email'            => $profile->user->email ?? '—',
                'role'             => $profile->level,
                'week_key'         => $weekKey,
                'slots'            => $slots,
                'is_finalized'     => $schedule->is_finalized ?? false,
                'total_free_hours' => $freeHours,
            ];
        });

        return response()->json([
            'success'  => true,
            'week_key' => $weekKey,
            'count'    => $exportData->count(),
            'data'     => $exportData->values(),
        ]);
    }
}
