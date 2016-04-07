<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Game extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username', 200);
            $table->bigInteger('creatorid');
            $table->bigInteger('opponentid');
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
