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

            $table->string('gamecode');


            $table->integer('user_a_id');
            $table->string('user_a_name');
            $table->integer('user_a_decision');

            $table->integer('user_b_id');
            $table->string('user_b_name');
            $table->integer('user_b_decision');

            $table->integer('winner');

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
