<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('state');
            $table->string('first_product');
            $table->string('destination');
            $table->integer('postcode');
            $table->string('address');
            $table->string('detailAddress');
            $table->string('extraAddress');
            $table->string('phone');
            $table->integer('price');
            $table->integer('productNum');
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
        Schema::dropIfExists('order_list');
    }
}
