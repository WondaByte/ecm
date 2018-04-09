<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBdcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bdc', function (Blueprint $table) {
            $table->increments('bdc_id');
            $table->string('name', 100);
            $table->string('address', 150);
            $table->string('phone', 15);
            $table->integer('bank_id')->references('bank_id')->on('banks');
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
        Schema::dropIfExists('bdc');
    }
}
