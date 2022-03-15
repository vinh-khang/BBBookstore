<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_book', function (Blueprint $table) {
            $table->increments('book_id');
            $table->string('book_name');
            $table->integer('category_id');
            $table->integer('publisher_id');
            $table->string('author');
            $table->text('book_desc');
            $table->text('book_content');
            $table->string('book_price');
            $table->string('book_image');
            $table->string('book_size');
            $table->string('page');
            $table->string('pub_house');
            $table->string('publishing_year');
            $table->integer('book_status');
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
        Schema::drop('tbl_book');
    }
}
