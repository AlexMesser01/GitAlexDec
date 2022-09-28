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
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id_product');
            $table->string('product_name')->index("prod_name");
            $table->string("content");
            $table->bigInteger("cost");
            $table->string("Prev_img");
            $table->string("prod_category")->index("prod_index");
            $table->bigInteger("sale");
            $table->foreign("prod_category")->references("category_prod")->on("product_category")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
