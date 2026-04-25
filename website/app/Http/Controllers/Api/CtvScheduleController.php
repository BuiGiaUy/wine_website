<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CtvProfile;
use App\Models\CtvSchedule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CtvScheduleController extends Controller
{
    // ──────────────────────────────────────────────
    //  CTV PROFILES — CRUD
    // ──────────────────────────────────────────────

    /**
     * List all CTV profiles (with related user info).
     * GET /api/ctv/profiles
     */
    public function indexProfiles(): JsonResponse
    {
        $profiles = CtvProfile::with('user:id,name,email')->get();

        return response()->json([
            'success' => true,
            'data'    => $profiles,
        ]);
    }

    /**
     * Show a single CTV profile.
     * GET /api/ctv/profiles/{userId}
     */
    public function showProfile(int $userId): JsonResponse
    {
        $profile = CtvProfile::with('user:id,name,email')->find($userId);

        if (!$profile) {
            return response()->json([
                'success' => false,
                'message' => 'CTV profile not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $profile,
        ]);
    }

    /**
     * Create or update a CTV profile for a user.
     * POST /api/ctv/profiles
     *
     * Body: { "user_id": 1, "level": "NEW" }
     */
    public function storeProfile(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer|exists:users,id',
            'level'   => 'required|in:NEW,SENIOR',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $profile = CtvProfile::updateOrCreate(
            ['user_id' => $request->input('user_id')],
            ['level'   => $request->input('level')]
        );

        return response()->json([
            'success' => true,
            'message' => 'CTV profile saved.',
            'data'    => $profile,
        ], 201);
    }

    /**
     * Delete a CTV profile (cascades to schedules).
     * DELETE /api/ctv/profiles/{userId}
     */
    public function destroyProfile(int $userId): JsonResponse
    {
        $deleted = CtvProfile::where('user_id', $userId)->delete();

        if (!$deleted) {
            return response()->json([
                'success' => false,
                'message' => 'CTV profile not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'CTV profile and related schedules deleted.',
        ]);
    }

    // ──────────────────────────────────────────────
    //  CTV SCHEDULES — CRUD
    // ──────────────────────────────────────────────

    /**
     * List schedules for a given user (optionally filtered by week_key).
     * GET /api/ctv/schedules/{userId}?week_key=2026-17
     */
    public function indexSchedules(int $userId, Request $request): JsonResponse
    {
        $profile = CtvProfile::find($userId);

        if (!$profile) {
            return response()->json([
                'success' => false,
                'message' => 'CTV profile not found for this user.',
            ], 404);
        }

        $query = CtvSchedule::where('user_id', $userId);

        if ($request->filled('week_key')) {
            $query->where('week_key', $request->input('week_key'));
        }

        $schedules = $query->orderByDesc('week_key')->get();

        // Append computed attribute
        $schedules->each(function ($schedule) {
            $schedule->append('total_free_hours');
        });

        return response()->json([
            'success' => true,
            'level'   => $profile->level,
            'data'    => $schedules,
        ]);
    }

    /**
     * Create or update a weekly schedule (upsert by user_id + week_key).
     * POST /api/ctv/schedules
     *
     * Body: {
     *   "user_id":  1,
     *   "week_key": "2026-17",
     *   "slots":    ["Mon_Morning", "Mon_Afternoon", "Tue_Evening"]
     * }
     */
    public function storeSchedule(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'user_id'  => 'required|integer|exists:ctv_profiles,user_id',
            'week_key' => ['required', 'string', 'regex:/^\d{4}-\d{2}$/'],
            'slots'    => 'required|array',
            'slots.*'  => 'string|in:' . implode(',', CtvProfile::ALL_SLOTS),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $schedule = CtvSchedule::updateOrCreate(
            [
                'user_id'  => $request->input('user_id'),
                'week_key' => $request->input('week_key'),
            ],
            [
                'slots' => $request->input('slots'),
            ]
        );

        $schedule->append('total_free_hours');

        return response()->json([
            'success' => true,
            'message' => 'Schedule saved.',
            'data'    => $schedule,
        ], 201);
    }

    /**
     * Finalize a schedule (mark as confirmed).
     * PATCH /api/ctv/schedules/{id}/finalize
     */
    public function finalizeSchedule(int $id): JsonResponse
    {
        $schedule = CtvSchedule::find($id);

        if (!$schedule) {
            return response()->json([
                'success' => false,
                'message' => 'Schedule not found.',
            ], 404);
        }

        $schedule->is_finalized = true;
        $schedule->save();

        $schedule->append('total_free_hours');

        return response()->json([
            'success' => true,
            'message' => 'Schedule finalized.',
            'data'    => $schedule,
        ]);
    }

    /**
     * Delete a schedule entry.
     * DELETE /api/ctv/schedules/{id}
     */
    public function destroySchedule(int $id): JsonResponse
    {
        $schedule = CtvSchedule::find($id);

        if (!$schedule) {
            return response()->json([
                'success' => false,
                'message' => 'Schedule not found.',
            ], 404);
        }

        $schedule->delete();

        return response()->json([
            'success' => true,
            'message' => 'Schedule deleted.',
        ]);
    }

    // ──────────────────────────────────────────────
    //  REPORTING
    // ──────────────────────────────────────────────

    /**
     * Weekly availability report for all CTVs.
     * GET /api/ctv/report?week_key=2026-17
     *
     * Returns each CTV's level, registered slots, and computed free hours.
     */
    public function weeklyReport(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'week_key' => ['required', 'string', 'regex:/^\d{4}-\d{2}$/'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $weekKey = $request->input('week_key');

        $profiles = CtvProfile::with(['user:id,name,email', 'schedules' => function ($q) use ($weekKey) {
            $q->where('week_key', $weekKey);
        }])->get();

        $report = $profiles->map(function (CtvProfile $profile) use ($weekKey) {
            $schedule  = $profile->schedules->first();
            $slotCount = $schedule ? count($schedule->slots ?? []) : 0;

            if ($profile->level === 'SENIOR') {
                $freeHours = CtvProfile::TOTAL_SLOTS_PER_WEEK - $slotCount;
            } else {
                $freeHours = $slotCount;
            }

            return [
                'user_id'        => $profile->user_id,
                'user_name'      => $profile->user->name ?? null,
                'level'          => $profile->level,
                'week_key'       => $weekKey,
                'slots'          => $schedule->slots ?? [],
                'is_finalized'   => $schedule->is_finalized ?? false,
                'total_free_hours' => $freeHours,
            ];
        });

        return response()->json([
            'success' => true,
            'data'    => $report,
        ]);
    }
}
