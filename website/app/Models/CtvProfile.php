<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CtvProfile extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'ctv_profiles';

    /**
     * The primary key for the model.
     */
    protected $primaryKey = 'user_id';

    /**
     * Indicates the primary key is NOT auto-incrementing.
     */
    public $incrementing = false;

    /**
     * This table has no timestamps columns (created_at / updated_at).
     */
    public $timestamps = false;

    /**
     * Total number of possible time-slots in a week.
     * 7 days × 3 slots (Morning, Afternoon, Evening) = 21
     */
    public const TOTAL_SLOTS_PER_WEEK = 21;

    /**
     * All possible slot values for validation / UI.
     */
    public const ALL_SLOTS = [
        'Mon_Morning', 'Mon_Afternoon', 'Mon_Evening',
        'Tue_Morning', 'Tue_Afternoon', 'Tue_Evening',
        'Wed_Morning', 'Wed_Afternoon', 'Wed_Evening',
        'Thu_Morning', 'Thu_Afternoon', 'Thu_Evening',
        'Fri_Morning', 'Fri_Afternoon', 'Fri_Evening',
        'Sat_Morning', 'Sat_Afternoon', 'Sat_Evening',
        'Sun_Morning', 'Sun_Afternoon', 'Sun_Evening',
    ];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'level',
    ];

    // ─── Relationships ───────────────────────────────────────

    /**
     * The user this CTV profile belongs to.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Weekly schedules belonging to this CTV profile.
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(CtvSchedule::class, 'user_id', 'user_id');
    }
}
