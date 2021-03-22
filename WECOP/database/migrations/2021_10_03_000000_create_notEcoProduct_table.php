<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotEcoProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('not_eco_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("eco_product_id");
            $table->text('name');
            $table->integer('price');
            $table->integer('emision');
            $table->integer('product_life');
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
        Schema::dropIfExists('not_eco_products');
    }
}
