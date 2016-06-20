<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Games', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_a_id');
            $table->foreign('user_a_name');
            $table->integer('user_a_score');
            $table->integer('user_b_id');
            $table->foreign('user_b_name');
            $table->integer('user_b_score');
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
        Schema::dropIfExists('Games');
        //
    }
}
