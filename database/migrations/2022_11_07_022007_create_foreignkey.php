<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order', function (Blueprint $table) {
            // Table "order"=>"users"
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('order_detail', function (Blueprint $table) {
            // Table "order_detail"=>"Users" + "order"
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('order_id')->references('id')->on('order');
        });
        Schema::table('rate', function (Blueprint $table) {
            // Table "Rate"=>"Users" + "Rate"=>"Products"
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
        });
       
        Schema::table('image_products', function (Blueprint $table) {
            
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreignkey');
    }
};
