<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->decimal('amount');
            $table->unsignedBigInteger('cliente_id');            
            $table->foreign('cliente_id')->references('id')->on('persona');
            $table->unsignedBigInteger('empleado_id');            
            $table->foreign('empleado_id')->references('id')->on('persona');
            $table->unsignedBigInteger('venta_id');            
            $table->foreign('venta_id')->references('id')->on('venta');

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
        Schema::dropIfExists('bills');
    }
}
