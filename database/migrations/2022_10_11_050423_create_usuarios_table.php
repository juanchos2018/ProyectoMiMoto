<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Usuario', function (Blueprint $table) {
            $table->id('IdUsuario');
            $table->string('username');
            $table->string('clave');
            $table->timestamps();
            $table->bigInteger('IdCliente')->unsigned();
            $table->bigInteger('IdEmpleado')->unsigned();
            $table->foreign('IdCliente')->references('IdCliente')->on('Cliente');
            $table->foreign('IdEmpleado')->references('IdEmpleado')->on('Empleado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
