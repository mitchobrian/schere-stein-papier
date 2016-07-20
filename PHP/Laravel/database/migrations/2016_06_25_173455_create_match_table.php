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

            $table->integer('f_game_id')->unsigned();
            
            $table->integer('f_user_a_id')->unsigned()->default(0);
            
            $table->string('user_a_decision')->default("0");;

            $table->integer('f_user_b_id')->unsigned()->default(0);
            
            $table->string('user_b_decision')->default("0");;

            $table->integer('winner')->default(0);
            
            $table->integer('nochmal_a')->default(0);
            $table->integer('nochmal_b')->default(0);

            $table->timestamps();

            $table->foreign('f_user_a_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('f_user_b_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('f_game_id')
                ->references('id')->on('games')
                ->onDelete('cascade');
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
