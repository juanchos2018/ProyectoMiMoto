<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Horario;

class HorarioController extends Controller
{
    //

    public function index()
    {
      //  $empleados = Empleado::get();
      //,compact("empleados"
        return view('pages.horario');
    } 




}
