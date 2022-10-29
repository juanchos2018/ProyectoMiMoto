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
        $horario = Horario::get();
        $categoria = Categoria::get();
        $empleados = Empleado::get();
        return view('pages.horario',compact("horario","categoria","empleados"));

        //return view('pages.horario');
        
    }

    public function store(Request $request)
    {        
       
        $exis =    Horario::where("IdCategoria",$request->IdCategoria)->where("fec_atencion",$request->fec_atencion)->get();
        if (count($exis)>0) {

            return response()->json(['status' => 400,'message'=>'Ya existe']);

        }else {
            $IdHorario = $request->IdHorario;
            $horario = Horario::firstOrNew(['IdHorario' => $IdHorario]);
            $horario->fill($request->all());
            $horario->save();

            return response()->json(['status' => 200,'message'=>'Registrado']);
        }      
    }

    public function getHorario($fecha){

        $horario =DB::table('horario')
        ->join("categoria", "horario.IdCategoria", "=", "categoria.IdCategoria")   
        ->select('categoria.IdCategoria','horario.IdHorario','categoria.descripcion')   
        ->where('horario.fec_atencion',$fecha)        
        ->orderBy('categoria.descripcion','DESC')->get();    
        if ($horario) {
            return response()->json(['status' => 200,'result'=>$horario]);
        }
        return response()->json(['status' => 400]);
    }


    public function horariocategoria($idcategoria){

        $horario = DB::table('horario')      
        ->join("empleado", "horario.IdEmpleado", "=", "empleado.IdEmpleado")   
        ->select('horario.IdHorario','horario.fec_atencion','empleado.IdEmpleado','empleado.Nombres','empleado.Apellidos')   
        ->where('horario.IdCategoria',$idcategoria)        
        ->get();    
        if ($horario) {
            return response()->json(['status' => 200,'result'=>$horario]);
        }
        return response()->json(['status' => 400]);
    }
}
