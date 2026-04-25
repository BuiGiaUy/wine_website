<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * CTV Profiles table — identifies which users are collaborators (CTV)
     * and their seniority level.
     *
     * Business Logic:
     *   NEW    = User registers "Free" time slots (Green UI).
     *   SENIOR = User is "Default Free" and only registers "Busy" time slots (Red UI).
     */
    public function up(): void
    {
        Schema::create('ctv_profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->primary();
            $table->enum('level', ['NEW', 'SENIOR'])->default('NEW');

            // Foreign key referencing existing users table (NOT modifying users)
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ctv_profiles');
    }
};
