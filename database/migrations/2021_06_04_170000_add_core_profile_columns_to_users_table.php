<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Later migrations reference columns (twitter, phone, biographical_info, …) that were never
 * added in an earlier migration. This fills the gap for fresh installs.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'username')) {
                $table->string('username')->nullable();
            }
            if (! Schema::hasColumn('users', 'first_name')) {
                $table->string('first_name')->nullable();
            }
            if (! Schema::hasColumn('users', 'last_name')) {
                $table->string('last_name')->nullable();
            }
            if (! Schema::hasColumn('users', 'role_id')) {
                $table->unsignedBigInteger('role_id')->nullable();
            }
            if (! Schema::hasColumn('users', 'public_name')) {
                $table->string('public_name')->nullable();
            }
            if (! Schema::hasColumn('users', 'website')) {
                $table->string('website')->nullable();
            }
            if (! Schema::hasColumn('users', 'facebook')) {
                $table->string('facebook')->nullable();
            }
            if (! Schema::hasColumn('users', 'twitter')) {
                $table->string('twitter')->nullable();
            }
            if (! Schema::hasColumn('users', 'pinterest')) {
                $table->string('pinterest')->nullable();
            }
            if (! Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable();
            }
            if (! Schema::hasColumn('users', 'biographical_info')) {
                $table->text('biographical_info')->nullable();
            }
            if (! Schema::hasColumn('users', 'image')) {
                $table->string('image')->nullable();
            }
        });
    }

    public function down(): void
    {
        //
    }
};
