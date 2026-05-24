<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_contents', function (Blueprint $table) {
            $table->id();
            $table->text('heading_line')->nullable();
            $table->string('contact_heading')->nullable();
            $table->string('address_heading')->nullable();
            $table->string('work_with_us_heading')->nullable();
            $table->string('form_heading')->nullable();
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
        Schema::dropIfExists('contact_contents');
    }
}
