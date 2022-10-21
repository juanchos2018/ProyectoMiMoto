<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Empleado;
use App\Models\Usuario;

class EmpleadoController extends Controller
{
    //

    public function index()
    {
        $empleados = Empleado::get();
        return view('pages.empleado',compact("empleados"));
    }

    public function create()
    {
        return view('pages.createEmpleado');
    }

    public function store(Request $request){


       // $exist = Empleado::find('')


        $validated = $request->validate([
            'Nombres' => 'required',
            'Apellidos' => 'required',
            'DNI' => 'required',
            'correo' => 'required',
        ]);

        $IdEmpleado = $request->IdEmpleado;
        $empleado = Empleado::firstOrNew(['IdEmpleado' => $IdEmpleado]);
        $empleado->fill($request->all());
        $empleado->save();

        //$IdEmpleado=$empleado->id;

        // $obj  =new Usuario();
        // $obj->username=$request->username;
        // $obj->clave=$request->clave;
        // $obj->IdEmpleado=$request->IdEmpleado;
        // $obj->save();


        return redirect()->action([EmpleadoController::class, 'index']);

    }

    public function getEmpleado(Request $request)
    {
        $empleado = Empleado::where('IdEmpleado', "=" , $request->IdEmpleado)->get()->first();
        // dd($empleado);
        return view('pages.createEmpleado', compact("empleado"));
    }

    public function update(Request $request){

        $categoria = Empleado::where('DNI',$request->DNI)
            ->update([
                "Nombres" =>$request->Nombres,
                "Apellidos" => $request->Apellidos,
                "correo" => $request->correo,
                "telefono" => $request->telefono,
            ]);
        $return = Empleado::where('DNI',$request->DNI)->get();
        return $return;
        // http://proyectomimoto.test/get-cat?IdCategoria=2
    }

}
