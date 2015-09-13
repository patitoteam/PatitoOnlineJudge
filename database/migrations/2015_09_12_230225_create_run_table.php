<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('run', function (Blueprint $table) {
            $table->increments('run_id');
            $table->integer('solution_id')->nullable;
            $table->integer('sourcecode_id')->nullable();
            $table->integer('problem_id')->nullable();
            $table->integer('language')->nullable();
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
        Schema::drop('run');
    }
}
