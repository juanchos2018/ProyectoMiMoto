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
        return view('pages.moto');
    }


    public function create()
    {
        return view('pages.createMoto');
    }

    public function store(Request $request){



        return redirect()->action([MotoController::class, 'index']);

    }

    public function update(Request $request)
    {
        $moto = Moto::where("IdMoto", $request->IdMoto)
            ->update([
                "marca" => $request->marca,
                "modelo" => $request->modelo,
                "color" => $request->color,
                "estado" => $request->estado
            ]);
        // $get_moto = Moto::where("IdMoto", $request->IdMoto)->get();
        // return $get_moto;
        return "correcto";
    }

}
