<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesVacunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_vacunas', function (Blueprint $table) {
            //id
            $table->id();
            $table->unsignedBigInteger('id_vacuna');
            $table->unsignedBigInteger('id_historial');

            //campos
            $table->integer('dosis');
            $table->date('fecha_aplicacion');
            $table->date('fecha_prox_aplicacion')->nullable();

            //foreing 
            $table->foreign('id_vacuna')->references('id')->on('vacunas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_historial')->references('id')->on('historiales_clinicos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('detalles_vacunas');
    }
}
