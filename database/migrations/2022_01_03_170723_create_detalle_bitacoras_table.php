<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleBitacorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_bitacoras', function (Blueprint $table) {
            $table->id();
            $table->string('event')->nullable();
            $table->string('nombre')->nullable();
            $table->string('correo')->nullable();
            $table->dateTime('fecha_accion')->nullable();
            $table->unsignedBigInteger('bitacora_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('bitacora_id')->on('bitacoras')->references('id')
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
        Schema::dropIfExists('detalle_bitacoras');
    }
}
