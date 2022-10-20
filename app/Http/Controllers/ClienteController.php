<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;


class ClienteController extends Controller
{
    //

    public function index()
    {
        $clientes = Cliente::get();
        return view('pages.cliente',compact("clientes"));
    }

    public function create()
    {
        return view('pages.createCliente');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'Nombres' => 'required',
            'Apellidos' => 'required',
            'DNI' => 'required',
            'correo' => 'required',
        ]);

        $IdCliente = $request->IdCliente;
        $cliente = Cliente::firstOrNew(['IdCliente' => $IdCliente]);
        $cliente->fill($request->all());
        $cliente->save();

        return redirect()->action([ClienteController::class, 'index']);

    }

    public function getCliente(Request $request)
    {
        $cliente = Cliente::where('IdCliente', "=" , $request->IdCliente)->get()->first();
        // dd($empleado);
        return view('pages.createCliente', compact("cliente"));
    }

}
