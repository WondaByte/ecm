<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name', 150);
            $table->float('quantity');
            $table->integer('bank_id')->references('bank_id')->on('banks');
            $table->integer('bdc_id')->references('bdc_id')->on('bdc');
            $table->integer('depot_id')->references('depot_id')->on('depots');
            $table->integer('lc_id')->references('lc_id')->on('lc');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
