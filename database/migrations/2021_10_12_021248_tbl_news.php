<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_news', function (Blueprint $table) {
            $table->increments('news_id');
            $table->string('news_title');
            $table->text('news_desc');
            $table->string('news_image');
            $table->text('news_content');
            $table->string('news_date');
            $table->string('news_auth');
            $table->integer('news_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_news');
    }
}
