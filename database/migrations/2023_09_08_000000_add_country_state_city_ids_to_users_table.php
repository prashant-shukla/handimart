<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'country_id')) {
                $table->unsignedBigInteger('country_id')->nullable();
            }
            if (! Schema::hasColumn('users', 'state_id')) {
                $table->unsignedBigInteger('state_id')->nullable();
            }
            if (! Schema::hasColumn('users', 'city_id')) {
                $table->unsignedBigInteger('city_id')->nullable();
            }
        });

        // Best-effort backfill when legacy columns stored numeric IDs as strings (MySQL).
        if (Schema::hasColumn('users', 'country')) {
            DB::statement(
                "UPDATE users SET country_id = CAST(TRIM(country) AS UNSIGNED) WHERE country REGEXP '^[0-9]+$' AND country_id IS NULL"
            );
        }
        if (Schema::hasColumn('users', 'state')) {
            DB::statement(
                "UPDATE users SET state_id = CAST(TRIM(state) AS UNSIGNED) WHERE state REGEXP '^[0-9]+$' AND state_id IS NULL"
            );
        }
        if (Schema::hasColumn('users', 'city')) {
            DB::statement(
                "UPDATE users SET city_id = CAST(TRIM(city) AS UNSIGNED) WHERE city REGEXP '^[0-9]+$' AND city_id IS NULL"
            );
        }
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'city_id')) {
                $table->dropColumn('city_id');
            }
            if (Schema::hasColumn('users', 'state_id')) {
                $table->dropColumn('state_id');
            }
            if (Schema::hasColumn('users', 'country_id')) {
                $table->dropColumn('country_id');
            }
        });
    }
};
