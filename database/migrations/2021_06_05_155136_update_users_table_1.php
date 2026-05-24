<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Avoid `after(...)`: older migrations never added anchors like `biographical_info` / `role_id` /
        // `phone` on fresh installs, which breaks MySQL. Column order is not important for the app.
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'new_added')) {
                $table->enum('new_added', ['0', '1'])->default('1');
            }
            if (! Schema::hasColumn('users', 'user_id')) {
                $table->string('user_id')->default('');
            }
            if (! Schema::hasColumn('users', 'otp')) {
                $table->string('otp')->nullable();
            }
            if (! Schema::hasColumn('users', 'phone_verified')) {
                $table->enum('phone_verified', ['0', '1'])->default('0');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
