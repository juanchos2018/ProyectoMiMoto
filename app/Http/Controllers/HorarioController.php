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
        $horario = Horario::get();
        $categoria = Categoria::get();
        return view('pages.horario',compact("horario","categoria"));

        //return view('pages.horario');
        
    }

    public function store(Request $request)
    {
        //
        //request()->validate()

        //$evento = Horario::create($request->all());

        // $validated = $request->validate([
        //   'empleado' => 'required',
        //   'categoria' => 'required',
        //   'start' => 'required'
        // ]);

        $IdHorario = $request->IdHorario;
        $horario = Horario::firstOrNew(['IdHorario' => $IdHorario]);
        $horario->fill($request->all());
        $horario->save();
    }


}
