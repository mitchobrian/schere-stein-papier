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
            
            $table->string('gamecode');
            
            $table->integer('f_user_a_id')->unsigned();
            $table->integer('user_a_score')->default(0);
            $table->integer('f_user_b_id')->unsigned();
            $table->integer('user_b_score')->default(0);
            $table->timestamps();

            $table->foreign('f_user_a_id')
                ->references('id')->on('Users')
                ->onDelete('cascade');

            $table->foreign('f_user_b_id')
                ->references('id')->on('Users')
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
        Schema::dropIfExists('Games');
        //
    }
}
