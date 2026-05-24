<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'dob')) {
                $table->string('dob')->nullable();
            }
            if (! Schema::hasColumn('users', 'gender')) {
                $table->string('gender')->nullable();
            }
            if (! Schema::hasColumn('users', 'aadhar1')) {
                $table->string('aadhar1')->nullable();
            }
            if (! Schema::hasColumn('users', 'aadhar2')) {
                $table->string('aadhar2')->nullable();
            }
            if (! Schema::hasColumn('users', 'aadhar3')) {
                $table->string('aadhar3')->nullable();
            }
            if (! Schema::hasColumn('users', 'country')) {
                $table->string('country')->nullable();
            }
            if (! Schema::hasColumn('users', 'state')) {
                $table->string('state')->nullable();
            }
            if (! Schema::hasColumn('users', 'city')) {
                $table->string('city')->nullable();
            }
            if (! Schema::hasColumn('users', 'zip_code')) {
                $table->string('zip_code')->nullable();
            }
            if (! Schema::hasColumn('users', 'address')) {
                $table->text('address')->nullable();
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
