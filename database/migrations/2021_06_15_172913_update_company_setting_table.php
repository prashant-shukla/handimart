<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCompanySettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {    if (Schema::hasTable('company_settings')) {
        Schema::table('company_setting', function (Blueprint $table) {
            $table->string('mobile_2')->nullable()->after('mobile');
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
        Schema::table('company_setting', function (Blueprint $table) {
            $table->string('mobile_2')->nullable()->after('mobile');
        });
    }
}
