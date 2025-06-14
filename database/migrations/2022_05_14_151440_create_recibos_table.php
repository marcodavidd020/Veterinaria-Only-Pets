<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecibosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recibos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('concepto',100);
            $table->integer('monto_cancelado');
            $table->integer('saldo');
            $table->integer('monto_total');
            $table->unsignedBigInteger('id_administrativo')->nullable();
         
            $table->foreign('id_administrativo')->references('id')->on('administrativos')->nullOnDelete()->onUpdate('cascade');
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
        Schema::dropIfExists('recibos');
    }
}
