<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tlb_admin', function (Blueprint $table) {
            $table->increments('admin_id');
             $table->string('admin_email',100);
              $table->string('admin_password');
               $table->string('admin_name');
                $table->string('admin_phone');
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
        Schema::drop('tlb_admin');
    }
}
