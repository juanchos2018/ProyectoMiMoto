<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Moto;

class MotoController extends Controller
{
    //
    public function index()
    {
      //  $clientes = Cliente::get();
        $motos = Moto::get();
        return view('pages.moto', compact('motos'));
    }


    public function create()
    {
        return view('pages.createMoto');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'color' => 'required',
            'estado' => 'required'
        ]);

        $IdMoto = $request->IdMoto;
        $moto = Categoria::firstOrNew(['IdCategoria' => $IdCategoria]);
        $moto->estado="Activo";
        $moto->fill($request->all());
        $moto->save();

        return redirect()->action([MotoController::class, 'index']);

    }

    public function getMoto(Request $request)
    {
        $moto = Moto::where('IdMoto', "=" , $request->IdMoto)->first();
        // dd($empleado);
        return view('pages.createMoto', compact("moto"));
    }

    // public function update(Request $request)
    // {
    //     $moto = Moto::where("IdMoto", $request->IdMoto)
    //         ->update([
    //             "marca" => $request->marca,
    //             "modelo" => $request->modelo,
    //             "color" => $request->color,
    //             "estado" => $request->estado
    //         ]);
    //     // $get_moto = Moto::where("IdMoto", $request->IdMoto)->get();
    //     // return $get_moto;
    //     return "correcto";
    // }


}
