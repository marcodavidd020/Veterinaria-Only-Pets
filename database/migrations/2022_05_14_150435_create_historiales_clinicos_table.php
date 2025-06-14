<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialesClinicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiales_clinicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mascota');
            $table->unsignedFloat('peso', 5, 3);
            $table->string('talla');
            $table->foreign('id_mascota')->references('id')->on('mascotas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('historial_clinicos');
    }
}
