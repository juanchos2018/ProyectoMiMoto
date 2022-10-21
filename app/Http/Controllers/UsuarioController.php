<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    //
    public function index()
    {
        $usuarios = Usuario::get();

        return $usuarios;
    }

    public function store(Request $request)
    {
        $usuario = new Usuario();
        $usuario->nom_usuario = $request->nom_usuario;
        $usuario->clave = $request->clave;
        $usuario->estado = 'A';
        $usuario->IdEmpleado = $request->IdEmpleado;
        $usuario->save();

        return redirect()->action([EmpleadoController::class, 'index']);
    }




}
