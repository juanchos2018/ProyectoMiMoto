<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class CitaController extends Controller
{
    public function index()
    {
        $cita = Cita::get();
        return view('pages.cita.cita',compact("cita"));
    }

    public function create()
    {
        return view('pages.cita.createCita');
    }

    public function store()
    {
        return view('pages.cita.createCita');
    }
}
