<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnoVetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turno_vets', function (Blueprint $table) {
            $table->unsignedBigInteger('id_veterinario');
            $table->unsignedBigInteger('id_turno');
            $table->foreign('id_veterinario')->references('id')->on('veterinarios');
            $table->foreign('id_turno')->references('id')->on('turnos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->primary(['id_veterinario','id_turno']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turno_vets');
    }
}
