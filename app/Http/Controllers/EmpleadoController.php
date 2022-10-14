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

}
