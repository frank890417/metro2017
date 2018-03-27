<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Stations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('stations',function($table){
            $table->increments('id');
            $table->string('name_cht');
            $table->string('name_eng');
            $table->text('description_cht');
            $table->text('description_eng');
            $table->string('tag')->default('');
            $table->string('pictures_url')->default(''); 
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
        Schema::drop('stations');
    }
}
