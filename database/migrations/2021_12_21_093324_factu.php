<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Factu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pago_id');
            $table->unsignedBigInteger('id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('pago_id')->on('pedidos_pagos')->references('id')
                ->onDelete('cascade');
            $table->foreign('id')->on('carritos_productos')->references('id')
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
        Schema::dropIfExists('factu');
    }
}
