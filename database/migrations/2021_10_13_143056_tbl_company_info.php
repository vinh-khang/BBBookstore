<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblCompanyInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_company_info', function (Blueprint $table) {
            $table->increments('company_info_id');
            $table->string('company_name');
            $table->string('company_address');
            $table->string('company_phone');
            $table->string('company_hotline');
            $table->string('company_facebook');
            $table->string('company_instagram');
            $table->string('company_youtube');
            $table->string('company_email');
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
        Schema::drop('tbl_company_info');
    }
}
