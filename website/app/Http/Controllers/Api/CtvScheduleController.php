<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CtvProfile;
use App\Models\CtvSchedule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * CTV Schedule Controller — User-facing endpoints.
 *
 * All routes are protected by:
 *   - auth (web guard / session) → user must be logged in
 *   - ctv                        → user must exist in ctv_profiles
 */
class CtvScheduleController extends Controller
{
    // ──────────────────────────────────────────────
    //  GET /api/ctv/schedule/me?week_key=YYYY-WW
    // ──────────────────────────────────────────────

    /**
     * Return the authenticated CTV's level and schedule for the requested week.
     * If no schedule exists for that week, returns an empty slots array.
     */
    public function me(Request $request): JsonResponse
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

        $user    = $request->user();
        $profile = CtvProfile::where('user_id', $user->id)->firstOrFail();
        $weekKey = $request->input('week_key');

        $schedule = CtvSchedule::where('user_id', $user->id)
            ->where('week_key', $weekKey)
            ->first();

        // Compute total free hours
        $slots     = $schedule ? ($schedule->slots ?? []) : [];
        $slotCount = count($slots);
        $freeHours = $profile->level === 'SENIOR'
            ? CtvProfile::TOTAL_SLOTS_PER_WEEK - $slotCount
            : $slotCount;

        return response()->json([
            'success' => true,
            'data'    => [
                'user_id'          => $user->id,
                'user_name'        => $user->name,
                'level'            => $profile->level,
                'week_key'         => $weekKey,
                'slots'            => $slots,
                'is_finalized'     => $schedule->is_finalized ?? false,
                'total_free_hours' => $freeHours,
            ],
        ]);
    }

    // ──────────────────────────────────────────────
    //  POST /api/ctv/schedule/save
    // ──────────────────────────────────────────────

    /**
     * Save (create or update) the authenticated CTV's schedule for a given week.
     *
     * Body: { "week_key": "2026-17", "slots": ["Mon_Morning", "Tue_Afternoon"] }
     */
    public function save(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'week_key' => ['required', 'string', 'regex:/^\d{4}-\d{2}$/'],
            'slots'    => 'required|array',
            'slots.*'  => 'string|in:' . implode(',', CtvProfile::ALL_SLOTS),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $user = $request->user();

        $schedule = CtvSchedule::updateOrCreate(
            [
                'user_id'  => $user->id,
                'week_key' => $request->input('week_key'),
            ],
            [
                'slots' => $request->input('slots'),
            ]
        );

        $schedule->load('profile');
        $schedule->append('total_free_hours');

        return response()->json([
            'success' => true,
            'message' => 'Schedule saved successfully.',
            'data'    => $schedule,
        ], 201);
    }

    // ──────────────────────────────────────────────
    //  POST /api/ctv/schedule/copy-previous
    // ──────────────────────────────────────────────

    /**
     * Copy the previous week's slots to the current (target) week.
     *
     * Body: { "week_key": "2026-17" }
     *
     * Logic: calculates week_key - 1, finds that schedule, and upserts
     * the current week with the same slots.
     */
    public function copyPrevious(Request $request): JsonResponse
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

        $user       = $request->user();
        $targetWeek = $request->input('week_key');

        // ── Calculate previous week key ──────────────────────
        [$year, $week] = explode('-', $targetWeek);
        $year = (int) $year;
        $week = (int) $week;

        if ($week <= 1) {
            // Roll back to last week of the previous year (ISO 8601)
            $prevYear = $year - 1;
            $prevWeek = (int) date('W', strtotime("$prevYear-12-28"));
            // Dec 28 always belongs to the last ISO week of its year
        } else {
            $prevYear = $year;
            $prevWeek = $week - 1;
        }

        $prevWeekKey = sprintf('%04d-%02d', $prevYear, $prevWeek);

        // ── Find previous week schedule ──────────────────────
        $previousSchedule = CtvSchedule::where('user_id', $user->id)
            ->where('week_key', $prevWeekKey)
            ->first();

        if (!$previousSchedule || empty($previousSchedule->slots)) {
            return response()->json([
                'success' => false,
                'message' => "No schedule found for previous week ($prevWeekKey). Nothing to copy.",
            ], 404);
        }

        // ── Upsert target week with copied slots ─────────────
        $schedule = CtvSchedule::updateOrCreate(
            [
                'user_id'  => $user->id,
                'week_key' => $targetWeek,
            ],
            [
                'slots' => $previousSchedule->slots,
            ]
        );

        $schedule->load('profile');
        $schedule->append('total_free_hours');

        return response()->json([
            'success'          => true,
            'message'          => "Slots copied from week $prevWeekKey to $targetWeek.",
            'copied_from_week' => $prevWeekKey,
            'data'             => $schedule,
        ], 201);
    }
}
