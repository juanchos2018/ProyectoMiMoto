<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
