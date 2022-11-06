<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\DetalleCita;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Moto;
use App\Models\Motor;


class CitaController extends Controller
{
    public function index()
    {
        $cita = Cita::get();
        // $horarios = Horarios::get();

        return view('pages.cita.cita',compact("cita"));
    }

    public function create()
    {


        return view('pages.cita.createCita');
    }
    public function creates()
    {
        return view('pages.cita.createCitas');
    }

    public function store(Request $request)
    {

        try {
          
                $fecha_actual = $request->fec_registro;
                $citas_fecha = Cita::select('fec_registro')
                ->where('fec_registro','<', $fecha_actual)
                ->get();
                $mensaje = '';
                //CITA Y DETALLE CITA
                if (count($citas_fecha) < 21) {

                    //TODO: guardar cliente si no existe
                    $id_cliente=null;
                    $cliente =Cliente::where('DNI',$request->DNI)->first();
                    if ($cliente) {
                    $id_cliente=$cliente->IdCliente;
                    }else{

                        $cliente = new Cliente();
                        $cliente->Nombres = $request->Nombres;
                        $cliente->Apellidos = $request->Apellidos;
                        $cliente->DNI = $request->DNI;
                        $cliente->correo = $request->correo;
                        $cliente->telefono = $request->telefono;
                        $cliente->save();
                    // $id_cliente = $cliente->id();
                        $id_cliente=$cliente->id;
                    }
                
                    //TODO: guardar motor si no existe
                    $motor = new Motor();
                    $motor->modelo = $request->modelo_motor;
                    $motor->potencia = $request->potencia;
                    $motor->cilindrada = $request->cilindrada_motor;
                    $motor->estado = $request->estado;
                    $motor->potencia = "200";
                    $motor->observaciones = $request->detalle_motor;
                    $motor->save();
                    //$id_motor = $motor->id();
                    $id_motor = $motor->IdMotor;

                    //TODO: guardar moto si no existe
                    $id_moto = NULL;
                    if ($request->IdMoto == 0 || $request->IdMoto == NULL) {
                        $moto = new Moto();
                        $moto->marca = $request->marca;
                        $moto->modelo = $request->modelo;
                        $moto->color = $request->color;
                        $moto->estado = $request->estado;
                        $moto->save();
                        $id_moto = $moto->id;
                    }else{
                        $id_moto = $request->IdMoto;
                    }


                    //cita save
                    // $validated = $request->validate([
                    //     'fec_registro' => 'required',
                    //     'estado' => 'required',
                    //     'IdHorario' => 'required',
                    //     'IdCliente' => 'required',
                    //     'IdUsuario' => 'required',
                    //     'IdMoto' => 'required',
                    //     'IdMotor' => 'required'
                    // ]);


                    $cita = new Cita();
                    $cita->fec_registro = $request->fec_registro;
                    $cita->estado = $request->estado;
                    $cita->IdHorario = $request->IdHorario;
                    $cita->IdCliente = $id_cliente;
                    $cita->IdUsuario = $request->IdUsuario;
                 

                    if ($cita->save()) {
                        $id_cita = $cita->IdCita;
                        // $idCita = Cita::latest('IdCita')->first();
                        $det_cita = new DetalleCita();
                        $det_cita->IdCita = $id_cita;//$request->IdCita;
                        $det_cita->IdMoto = $id_moto;//$request->IdMoto;
                        $det_cita->IdMotor = $id_motor;//$request->IdMotor;
                        $det_cita->detalle_moto = $request->detalle_moto;
                        $det_cita->detalle_motor = $request->detalle_motor;
                        $det_cita->save();
                        $mensaje = 'Guardado con exito';
                    }
                    else{
                        $mensaje = 'Ocurrio un error al momento de guardar';
                    }

                    return response()->json(['status' => 200,'result'=>$mensaje]);
                    // return view('pages.cita.cita');
                    // return [$mensaje, $citas_fecha, "cita"=>$cita, "detalle"=> $detalle_cita];

                }
                else{
                    $mensaje = 'Ya no puedes guardar citas para esta fecha';
                    // return view('pages.cita.createCita', compact('mensaje'));
                    return response()->json(['status' => 400,'result'=>$mensaje]);
                }
                
            } catch (\Exception $e){      
            $mensaje = 'Ya no puedes guardar citas para esta fecha';
            // return view('pages.cita.createCita', compact('mensaje'));
            return response()->json(['status' => 404,'message'=>$e->getMessage()]);
        }

        


    }
}
