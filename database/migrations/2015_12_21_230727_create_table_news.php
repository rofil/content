<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rofil_content_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title", 255);
            $table->text("body");
            $table->boolean("published");
            $table->integer("user_id");
            $table->integer("viewed");
            $table->string("image");
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
        Schema::drop('rofil_content_news');
    }
}
