<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lc', function (Blueprint $table) {
            $table->increments('lc_id');
            $table->string('lc_name');
            $table->decimal('amount');
            $table->string('supplier', 100);
            $table->date('date_issued');
            $table->date('date_expired');
            $table->text('message');
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
        Schema::dropIfExists('lc');
    }
}
