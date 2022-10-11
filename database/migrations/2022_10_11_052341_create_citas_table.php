<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cita', function (Blueprint $table) {
            $table->id('IdCita');
            $table->date('fecha');
            $table->string('estado', '20');
            $table->timestamps();
            $table->bigInteger('IdMotocicleta')->unsigned();
            $table->bigInteger('IdCliente')->unsigned();
            $table->bigInteger('IdEmpleado')->unsigned();
            $table->bigInteger('IdTipoCita')->unsigned();
            $table->foreign('IdMotocicleta')->references('IdMotocicleta')->on('Motocicleta');
            $table->foreign('IdCliente')->references('IdCliente')->on('Cliente');
            $table->foreign('IdEmpleado')->references('IdEmpleado')->on('Empleado');
            $table->foreign('IdTipoCita')->references('IdTipoCita')->on('TipoCita');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
