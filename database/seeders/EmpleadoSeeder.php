<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empleado')->insert([
            'IdEmpleado' => 1,
            'Nombres' => 'Nombre Empleado',
            'Apellidos' => 'Apellidos Empleado',
            'DNI' => '45713877',
            'correo' => 'correo@gmail.com',
            'telefono' => '970782555',
        ]);

        DB::table('usuario')->insert([
            'IdUsuario' => 1,
            'nom_usuario' => 'empleado1',
            'clave' => '123456',
            'estado' => 'A',
            'IdEmpleado' => 1
        ]);

        DB::table('categoria')->insert([
            'IdCategoria' => 1,
            'descripcion' => 'Garantica',   
            'estado' => 'A'         
        ]);
        
        DB::table('categoria')->insert([
            'IdCategoria' => 2,
            'descripcion' => 'Prventivo',   
            'estado' => 'A'         
        ]);
    }
}
