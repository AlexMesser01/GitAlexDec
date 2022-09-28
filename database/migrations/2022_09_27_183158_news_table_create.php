<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id_news');
            $table->string('Tittle');
            $table->string("content");
            $table->string("category_news")->index("news_category");
            $table->string("author_news")->index("news_author");
            $table->date("public_date");
            $table->foreign("category_news")->references("category")->on("categories")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("author_news")->references("Username")->on("user")->onDelete("cascade")->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
