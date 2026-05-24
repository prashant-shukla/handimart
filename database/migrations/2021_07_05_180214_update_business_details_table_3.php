<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBusinessDetailsTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_details', function (Blueprint $table) {
            $table->string('establisment_year')->nullable()->after('skills');
            $table->string('number_employee')->nullable()->after('establisment_year');
            $table->string('gts_number')->nullable()->after('number_employee');
            $table->string('gst_document')->nullable()->after('gts_number');
            $table->string('export_certificate_no')->nullable()->after('gst_document');
            $table->string('export_certificate_document')->nullable()->after('export_certificate_no');
            $table->string('logo')->nullable()->after('export_certificate_document');
            $table->longText('about_company')->nullable()->after('logo');
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
