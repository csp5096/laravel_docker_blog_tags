<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table)
            {
                $table->increments('id');
                $table->integer('user_id')->unsigned();
                $table->string('title');
                $table->text('body');
                $table->timestamps();

                // Foreign Key Constraint for User Articles with delete.
                $table->foreign('user_id')
                      ->references('id')
                      ->on('users')
                      ->onDelete('cascade');
            }
         );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
