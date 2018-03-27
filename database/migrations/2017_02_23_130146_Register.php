<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Register extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::create('registers',function($table){
        $table->increments('id');
        $table->string("uuid")->default('');
        $table->integer("creator_count");
        $table->integer("station")->default(1);
        $table->text("description");
        $table->string("agreement_file",500)->default('');
        $table->string("work_file",500)->default('');

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
        //
      Schema::drop('registers');
    }
}
