<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * CTV Schedules table — stores weekly availability/busy slots.
     *
     * Reporting Logic (for reference):
     *   If level = NEW   → Total Free Hours = count(slots)
     *   If level = SENIOR → Total Free Hours = TOTAL_SLOTS_PER_WEEK (21) - count(slots)
     */
    public function up(): void
    {
        Schema::create('ctv_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('week_key', 10)->comment("Format: 'YYYY-WW', e.g. '2026-17'");
            $table->json('slots')->comment('Array of slot strings, e.g. ["Mon_Morning","Mon_Afternoon"]');
            $table->boolean('is_finalized')->default(false);
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            // Foreign key referencing ctv_profiles (which itself references users)
            $table->foreign('user_id')
                  ->references('user_id')
                  ->on('ctv_profiles')
                  ->onDelete('cascade');

            // Unique constraint: one schedule per user per week
            $table->unique(['user_id', 'week_key'], 'ctv_schedules_user_week_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ctv_schedules');
    }
};
