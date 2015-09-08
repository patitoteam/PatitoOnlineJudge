<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemhastagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problemhastags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('problem_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->foreign('problem_id')->references('id')->on('problems')->onDelete('cascade');;
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');;
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
        Schema::drop('problemhastags');
    }
}
