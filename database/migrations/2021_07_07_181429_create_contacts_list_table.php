<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_list', function (Blueprint $table) {
            $table->id();
            $table->integer('sender_id')->default(0)->nullable();
			$table->integer('receiver_id')->default(0)->nullable();
            $table->string('sender_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
			$table->string('message_heading')->nullable();
			$table->text('message')->nullable();
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
        Schema::dropIfExists('contacts_list');
    }
}
