<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('job_type')->nullable()->after('zip_code');
            $table->string('tags')->nullable()->after('job_type');
            $table->string('url_email')->nullable()->after('tags');
            $table->string('company_name')->nullable()->after('url_email');
            $table->string('tagline')->nullable()->after('company_name');
            $table->string('video_url')->nullable()->after('tagline');
            $table->string('twitter')->nullable()->after('video_url');
            $table->string('logo')->nullable()->after('twitter');
            $table->dateTime('closing_date')->default(NOW());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('mobile_2')->nullable()->after('mobile');
        });
    }
}
