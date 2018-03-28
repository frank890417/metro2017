<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Creator2018 extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('creators2018',function($table){
            $table->increments('id');
            $table->string("register_id")->default('');
            $table->integer("rank");
            $table->integer("age")->default(0);
            $table->string("name",500)->default('');
            $table->string("phone",500)->default('');
            $table->string("mail",500)->default('');
            $table->string("address",500)->default('');
            $table->boolean("attend_workshop")->default(false);
            $table->string("agreement_file",500)->default('');

            
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
        Schema::drop('creators2018');
    }
}
