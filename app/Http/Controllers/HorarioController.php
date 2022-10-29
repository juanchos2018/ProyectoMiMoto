<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Horario;
use App\Models\Categoria;
use App\Models\Empleado;

use Illuminate\Support\Facades\DB;


class HorarioController extends Controller
{
    //

    public function index()
    {
        $categoria = Categoria::get();
        $empleados = Empleado::get();
        return view('pages.horario',compact("categoria","empleados"));

        //return view('pages.horario');
        
    }

    public function store(Request $request)
    {
        $IdHorario = $request->IdHorario;
        $horario = Horario::firstOrNew(['IdHorario' => $IdHorario]);
        $horario->fill($request->all());
        $horario->save();        
    }

    public function show(Horario $horario)
    {
        //$horario = Horario::select('IdCategoria as title','fec_atencion as start','fec_atencion as end')->get();
        $horario = DB::table('horario')
                    ->join('categoria', 'categoria.IdCategoria', '=', 'horario.IdCategoria')
                    ->select('horario.IdHorario as id','categoria.descripcion AS title','horario.fec_atencion as start','horario.fec_atencion as end','categoria.color as color')
                    ->get();
        //dd($horario);
        return response()->json($horario);
    }

    public function edit($IdHorario)
    {
        //
        $horario = Horario::find($IdHorario);
        return response()->json($horario);
    }
}