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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_ID');
            $table->string('user_name');
            $table->string('user_address');
            $table->string('user_phone');
            $table->string('user_email');
            $table->decimal('total',15,0);
            $table->integer('accept_status')->default('0');
            $table->integer('payment_status')->default('0');
            $table->string('payment_method');
            $table->integer('ship_status')->default('0');
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
        Schema::dropIfExists('order');
    }
};
