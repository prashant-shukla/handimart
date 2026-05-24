<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiryMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiry_messages', function (Blueprint $table) {
            $table->id();
            $table->integer('contact_id')->default(0)->nullable();
            $table->integer('sender_id')->default(0)->nullable();
			$table->integer('receiver_id')->default(0)->nullable();
			$table->integer('read_status')->default(0)->nullable();
            $table->string('message')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('enquiry_messages');
    }
}
