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
        Schema::create('cart', function (Blueprint $table) {
            $table->string("cart_product")->index("cart_name");
            $table->string("customer")->index("cart_customer");
            $table->integer("count");
            $table->integer("cart_price");
            $table->integer("cart_summ");
            $table->foreign("cart_product")->references("product_name")->on("product")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("customer")->references("Username")->on("user")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
};
