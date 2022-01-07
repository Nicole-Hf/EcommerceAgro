<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nroFactura')->nullable();
            $table->date('fecha');
            $table->string('codControl');
            $table->unsignedBigInteger('nit');
            $table->float('totalImpuesto');
            $table->unsignedBigInteger('pago_id');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('pago_id')->on('pedidos_pagos')->references('id')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
