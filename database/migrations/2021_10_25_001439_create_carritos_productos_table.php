<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarritosProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carritos_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carrito_id');
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('cantidad');
            $table->float('subtotal');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('carrito_id')->on('carritos')->references('id')
                ->onDelete('cascade');
            $table->foreign('producto_id')->on('productos')->references('id')
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
        Schema::dropIfExists('carritos_productos');
    }
}
