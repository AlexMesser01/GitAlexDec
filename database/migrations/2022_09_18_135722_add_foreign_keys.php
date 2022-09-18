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
        Schema::table('user_info', function (Blueprint $table) {
            $table->foreign("user")->references("Username")->on("user")->onDelete("cascade")->onUpdate("cascade");
        });
        Schema::table('news', function (Blueprint $table) {
            $table->foreign("author_news")->references("Username")->on("user")->onDelete("cascade")->onUpdate("cascade");
        });
        Schema::table('news', function (Blueprint $table) {
            $table->foreign("category_news")->references("catrgory")->on("user")->onDelete("categories")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
