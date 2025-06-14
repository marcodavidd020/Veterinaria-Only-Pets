<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_ingresos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_proveedor')->nullable();
            $table->unsignedBigInteger('id_producto')->nullable();
            $table->unsignedBigInteger('id_administrativo')->nullable();

            $table->integer('cantidad');
            $table->date('fecha');
            $table->time('hora');
            $table->integer('monto_total');

            $table->foreign('id_proveedor')->references('id')->on('proveedores')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('id_administrativo')->references('id')->on('administrativos')->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('notas_ingresos');
    }
}
