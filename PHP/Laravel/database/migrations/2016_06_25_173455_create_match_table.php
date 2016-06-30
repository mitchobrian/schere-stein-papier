<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match', function (Blueprint $table) {

            $table->increments('id');

            $table->string('gamecode')->default("0");;


            $table->integer('user_a_id')->default(0);
            $table->string('user_a_name')->default("0");;
            $table->string('user_a_decision')->default("0");;

            $table->integer('user_b_id')->default(0);;
            $table->string('user_b_name')->default("0");;
            $table->string('user_b_decision')->default("0");;

            $table->integer('winner')->default(0);;

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
        Schema::drop('match');
    }
}
