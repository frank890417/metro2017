<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Register2018 extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::create('registers2018',function($table){
        $table->increments('id');
        $table->string("uuid")->default('');
        $table->integer("creator_count");
        $table->string("concept_0_target",500)->default('')->nullable();
        $table->string("concept_0_content",500)->default('')->nullable();
        $table->string("concept_1_target",500)->default('')->nullable();
        $table->string("concept_1_content",500)->default('')->nullable();
        $table->string("concept_2_target",500)->default('')->nullable();
        $table->string("concept_2_content",500)->default('')->nullable();

        $table->string("work_0_name",500)->default('')->nullable();
        $table->string("work_0_content",500)->default('')->nullable();
        $table->string("work_0_file",500)->default('')->nullable();
        $table->string("work_1_name",500)->default('')->nullable();
        $table->string("work_1_content",500)->default('')->nullable();
        $table->string("work_1_file",500)->default('')->nullable();
        $table->string("work_2_name",500)->default('')->nullable();
        $table->string("work_2_content",500)->default('')->nullable();
        $table->string("work_2_file",500)->default('')->nullable();

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
      Schema::drop('registers2018');
    }
}



