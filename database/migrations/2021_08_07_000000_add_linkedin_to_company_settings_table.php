<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLinkedinToCompanySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('company_settings') && !Schema::hasColumn('company_settings', 'linkedin')) {
            Schema::table('company_settings', function (Blueprint $table) {
                $table->string('linkedin')->nullable()->after('twitter');
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
        if (Schema::hasTable('company_settings') && Schema::hasColumn('company_settings', 'linkedin')) {
            Schema::table('company_settings', function (Blueprint $table) {
                $table->dropColumn('linkedin');
            });
        }
    }
}
