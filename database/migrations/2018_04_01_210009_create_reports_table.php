<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('reports_id');
            $table->string('vehicle_number', 10);
            $table->string('driver_name', 100);
            $table->string('shore_tank_number', 50);
            $table->string('order_number', 50);
            $table->string('way_bill_number', 50);
            $table->string('customer');
            $table->float('obs_litres');
            $table->float('obs_temp');
            $table->float('density_at_15_deg');
            $table->float('vc_factor');
            $table->float('litres_at_15_deg');
            $table->float('metric_tons_vac');
            $table->float('metric_tons_air');
            $table->integer('product_id')->references('product_id')->on('products');
            $table->integer('user_id')->references('user_id')->on('users');
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
        Schema::dropIfExists('reports');
    }
}
