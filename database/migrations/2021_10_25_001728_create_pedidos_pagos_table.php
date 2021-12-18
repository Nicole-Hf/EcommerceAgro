<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_pagos', function (Blueprint $table) {
            $table->id();
            $table->float('monto');
            $table->string('estado',20);
            $table->dateTime('fechaPago');
            $table->date('fechaEnvio')->nullable();
            $table->string('pais',100);
            $table->string('ciudad',100);
            $table->string('direccionEnvio',200);
            $table->string('telfCliente',15)->nullable();
            $table->unsignedBigInteger('carrito_id');
            $table->unsignedBigInteger('tarjeta_id');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('carrito_id')->on('carritos')->references('id')
                ->onDelete('cascade');
            $table->foreign('tarjeta_id')->on('tarjetas')->references('id')
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
        Schema::dropIfExists('pedidos_pagos');
    }
}
