<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_details', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('ccode')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('work_in')->nullable();
            $table->string('work_type')->nullable();
            $table->string('job_done')->nullable();
            $table->integer('team_size')->nullable();
            $table->string('per_day_fee')->nullable();
            $table->string('skills')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_details');
    }
}
