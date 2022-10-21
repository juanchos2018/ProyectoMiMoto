<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Categoria;

class CategoriaController extends Controller
{
    //

    public function index()
    {
        $categorias = Categoria::get();
        ///compact("empleados")
        return view('pages.categoria',compact("categorias"));
    }

    public function create()
    {
        return view('pages.createCategoria');
    }

    public function store(Request $request){
        // $exist = Empleado::find('')

        $validated = $request->validate([
            'descripcion' => 'required'
        ]);

        $IdCategoria = $request->IdCategoria;
        $categoria = Categoria::firstOrNew(['IdCategoria' => $IdCategoria]);
        $categoria->estado="Activo";
        $categoria->fill($request->all());
        $categoria->save();

        return redirect()->action([CategoriaController::class, 'index']);

    }
    public function getCategoria(Request $request)
    {
        $categoria = Categoria::where('IdCategoria', "=" , $request->IdCategoria)->first();
        // dd($empleado);
        return view('pages.createCategoria', compact("categoria"));
    }
    // public function update(Request $request){

    //     $categoria = Categoria::where('IdCategoria',$request->IdCategoria)
    //         ->update([
    //             "descripcion" => $request->descripcion,
    //             "estado" => $request->estado??'A'
    //         ]);
    //     $return = Categoria::where('IdCategoria',$request->IdCategoria)->get();
    //     return $return;
    //     // http://proyectomimoto.test/get-cat?IdCategoria=2
    // }
}
