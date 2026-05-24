<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCompanySettingTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if (Schema::hasTable('company_settings')) {
        Schema::table('company_settings', function (Blueprint $table) {
            $table->string('google_plus')->nullable()->after('website_name');
            $table->string('youtube')->nullable()->after('google_plus');
            $table->string('twitter')->nullable()->after('youtube');
            $table->string('pinterest')->nullable()->after('twitter');
            $table->string('facebook')->nullable()->after('pinterest');
            $table->string('instagram')->nullable()->after('facebook');
        });
         }
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
