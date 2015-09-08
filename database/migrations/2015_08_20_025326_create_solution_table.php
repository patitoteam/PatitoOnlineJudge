<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolutionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solution', function (Blueprint $table) {
            $table->increments('solution_id')->nullable();
            $table->integer("problem_id")->nullable();
            $table->string("user_id")->nullable();
            $table->integer("time")->nullable();
            $table->integer("memory")->nullable();
            $table->date("in_date")->nullable();
            $table->smallInteger("result")->nullable();
            $table->integer("language")->nullable();
            $table->string("ip")->nullable();
            $table->integer("contest_id")->nullable();
            $table->tinyinteger("valid")->nullable();
            $table->tinyinteger("num")->nullable();
            $table->integer("code_lenght")->nullable();
            $table->date("judgetime")->nullable();
            $table->decimal("pass_rate")->nullable();
            $table->string('source_code')->nullable();
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
        Schema::drop('solution');
    }
}
