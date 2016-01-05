<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTopicToTableNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rofil_content_news', function (Blueprint $table) {
            $table->integer("topic_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rofil_content_news', function (Blueprint $table) {
            $table->dropColumn('topic_id');
        });
    }
}
