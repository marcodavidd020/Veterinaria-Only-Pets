<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesCirugiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_cirugias', function (Blueprint $table) {
            
            //estos son los ID
            $table->id();
            $table->unsignedBigInteger('id_cirugia');
            $table->unsignedBigInteger('id_historial');

            //estos son campos 
            $table->date('fecha');
            $table->time('hora');
            $table->string('veterinario_encargado');

            //declarando las llaves
            $table->foreign('id_cirugia')->references('id')->on('cirugias')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('detalles_cirugias');
    }
}
