<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegistRequiredataChange extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('registers',function($table){
            $table->dropColumn('agreement_file');
        });

        Schema::table('creators',function($table){
            $table->dropColumn('address');
            $table->string('country')->default('');
            $table->integer('is_eighteen')->default(0);
            $table->string('agreement_file')->default('');
            $table->string('under_eighteen_file')->default('');
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
        Schema::table('registers',function($table){
            $table->string("agreement_file",500)->default('');
        });
        
        Schema::table('creators', function ($table) { 
            $table->string("address",500)->default('');
            $table->dropColumn('country');
            $table->dropColumn('is_eighteen');
            $table->dropColumn('agreement_file');
            $table->dropColumn('under_eighteen_file');
        });
    }
}
