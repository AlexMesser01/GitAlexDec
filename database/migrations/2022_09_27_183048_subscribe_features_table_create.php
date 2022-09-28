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
        Schema::create('subscription_features', function (Blueprint $table) {
            $table->string("product")->index("prod_features")->primary();
            $table->bigInteger('duration');
            $table->string('platform');
            $table->string("os");
            $table->string("Password");
            $table->string("media_type");
            $table->string("review_img");
            $table->foreign("product")->references("product_name")->on("product")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription_features');
    }
};
