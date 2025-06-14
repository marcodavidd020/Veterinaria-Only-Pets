<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesHistorial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_historial', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->date('fecha_consulta');
            $table->date('fecha_prox_consulta')->nullable();
            $table->unsignedBigInteger('id_historial');
            $table->foreign('id_historial')->references('id')->on('historiales_clinicos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles_historial');
    }
}
