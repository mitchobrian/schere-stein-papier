<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Scores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Scores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('gameid');
            $table->bigInteger('userid');
            $table->Integer('win');
            $table->Integer('lose');
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
