<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Horario;
use App\Models\Categoria;

class HorarioController extends Controller
{
    //

    public function index()
    {
        //$horario = Horario::get();
        //$categoria = Categoria::get();
        //return view('pages.horario',compact("horario","categoria"));

        return view('pages.horario');
        
    }


}
