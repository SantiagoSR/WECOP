<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcoProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eco_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->integer('price');
            $table->integer('stock');
            $table->text('facts');
            $table->text('description');
            $table->text('categories');
            $table->float('emision');
            $table->integer('productLife');
            $table->text('photo');
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
        Schema::dropIfExists('eco_products');
    }
}
