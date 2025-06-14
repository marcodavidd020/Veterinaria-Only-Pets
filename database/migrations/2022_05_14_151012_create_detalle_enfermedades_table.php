<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleEnfermedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_enfermedades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_enfermedad');
            $table->unsignedBigInteger('id_historial');
            $table->date('fecha_deteccion');
            $table->date('inicio_tratamiento')->nullable();
            $table->date('fin_tratamiento')->nullable();
            //declaración de llaves
            $table->foreign('id_historial')->references('id')->on('historiales_clinicos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_enfermedad')->references('id')->on('enfermedades')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('detalle_enfermedades');
    }
}
