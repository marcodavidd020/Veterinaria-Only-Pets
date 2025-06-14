<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_recibo');
            $table->unsignedBigInteger('id_producto')->nullable();
            $table->unsignedBigInteger('cantidad');
            $table->unsignedBigInteger('precio_total');

            $table->foreign('id_recibo')->references('id')->on('recibos');
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('detalles_ventas');
    }
}
