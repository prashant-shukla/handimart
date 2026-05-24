<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMobile2ToCompanySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('company_settings') && !Schema::hasColumn('company_settings', 'mobile_2')) {
            Schema::table('company_settings', function (Blueprint $table) {
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
        if (Schema::hasTable('company_settings') && Schema::hasColumn('company_settings', 'mobile_2')) {
            Schema::table('company_settings', function (Blueprint $table) {
                $table->dropColumn('mobile_2');
            });
        }
    }
}
