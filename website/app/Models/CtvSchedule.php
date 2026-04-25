<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CtvSchedule extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'ctv_schedules';

    /**
     * Only `updated_at` is managed; disable Laravel's default
     * dual-timestamp behaviour and let the DB handle updated_at.
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'week_key',
        'slots',
        'is_finalized',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'slots'        => 'array',
        'is_finalized' => 'boolean',
        'updated_at'   => 'datetime',
    ];

    // ─── Relationships ───────────────────────────────────────

    /**
     * The CTV profile this schedule belongs to.
     */
    public function profile(): BelongsTo
    {
        return $this->belongsTo(CtvProfile::class, 'user_id', 'user_id');
    }

    /**
     * Convenience: the user who owns this schedule.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // ─── Business Logic ──────────────────────────────────────

    /**
     * Calculate total free hours based on the user's CTV level.
     *
     * NEW    → free hours = count(slots)           (they register FREE time)
     * SENIOR → free hours = 21 - count(slots)      (they register BUSY time)
     */
    public function getTotalFreeHoursAttribute(): int
    {
        $slotCount = is_array($this->slots) ? count($this->slots) : 0;
        $level     = $this->profile->level ?? 'NEW';

        if ($level === 'SENIOR') {
            return CtvProfile::TOTAL_SLOTS_PER_WEEK - $slotCount;
        }

        return $slotCount;
    }
}
