<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\DetalleCita;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Moto;
use App\Models\Motor;
use Illuminate\Support\Facades\DB;

use App\Http\Resources\CitasCollection;


class CitaController extends Controller
{
    public function index()
    {
        $cita = Cita::get();


       // $cita   = new CitasCollection($data);  
      //  dd($cita);
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

        $cita = new Cita();
        $cita->fec_registro = $request->fec_registro;
        $cita->estado = $request->estado;
        $cita->IdHorario = $request->IdHorario;
        $cita->IdCliente = $request->IdCliente;
        $cita->IdCategoria = $request->IdCategoria;
        $cita->IdUsuario = 1;
        $cita->save();

        $id_cita = $cita->IdCita;

        $det_cita = new DetalleCita();

        $det_cita->IdCita = $id_cita;
        $det_cita->IdMoto = $request->id_moto;
        $det_cita->detalle_moto = $request->detalle_moto;
        $det_cita->detalle_motor = $request->detalle_moto;
        $det_cita->save();

         $mensaje = 'Guardado con exito';

        return response()->json(['status' => 200,'result'=>$mensaje]);


        } catch (\Exception $e){               
  
            return response()->json(['status' => 404,'message'=>$e->getMessage()]);
        }  


        // try {
          
        //         $fecha_actual = $request->fec_registro;
        //         $citas_fecha = Cita::select('fec_registro')
        //         ->where('fec_registro','<', $fecha_actual)
        //         ->get();
        //         $mensaje = '';
           
        //         if (count($citas_fecha) < 21) {

    
        //             $id_cliente=null;
        //             $cliente =Cliente::where('DNI',$request->DNI)->first();
        //             if ($cliente) {
        //             $id_cliente=$cliente->IdCliente;
        //             }else{

        //                 $cliente = new Cliente();
        //                 $cliente->Nombres = $request->Nombres;
        //                 $cliente->Apellidos = $request->Apellidos;
        //                 $cliente->DNI = $request->DNI;
        //                 $cliente->correo = $request->correo;
        //                 $cliente->telefono = $request->telefono;
        //                 $cliente->save();
               
        //                 $id_cliente=$cliente->id;
        //             }
                
              
        //             $motor->modelo = $request->modelo_motor;
        //             $motor->potencia = $request->potencia;
        //             $motor->cilindrada = $request->cilindrada_motor;
        //             $motor->estado = $request->estado;
        //             $motor->potencia = "200";
        //             $motor->observaciones = $request->detalle_motor;
        //             $motor->save();
                
        //             $id_motor = $motor->IdMotor;

 
        //             $id_moto = NULL;
        //             if ($request->IdMoto == 0 || $request->IdMoto == NULL) {
        //                 $moto = new Moto();
        //                 $moto->marca = $request->marca;
        //                 $moto->modelo = $request->modelo;
        //                 $moto->color = $request->color;
        //                 $moto->estado = $request->estado;
        //                 $moto->save();
        //                 $id_moto = $moto->id;
        //             }else{
        //                 $id_moto = $request->IdMoto;
        //             }

        //             $cita = new Cita();
        //             $cita->fec_registro = $request->fec_registro;
        //             $cita->estado = $request->estado;
        //             $cita->IdHorario = $request->IdHorario;
        //             $cita->IdCliente = $id_cliente;
        //             $cita->IdUsuario = $request->IdUsuario;
                 

        //             if ($cita->save()) {
        //                 $id_cita = $cita->IdCita;
                      
        //                 $det_cita = new DetalleCita();
        //                 $det_cita->IdCita = $id_cita;
        //                 $det_cita->IdMoto = $id_moto;
        //                 $det_cita->IdMotor = $id_motor;
        //                 $det_cita->detalle_moto = $request->detalle_moto;
        //                 $det_cita->detalle_motor = $request->detalle_motor;
        //                 $det_cita->save();
        //                 $mensaje = 'Guardado con exito';
        //             }
        //             else{
        //                 $mensaje = 'Ocurrio un error al momento de guardar';
        //             }

        //             return response()->json(['status' => 200,'result'=>$mensaje]);
               

        //         }
        //         else{
        //             $mensaje = 'Ya no puedes guardar citas para esta fecha';
              
        //             return response()->json(['status' => 400,'result'=>$mensaje]);
        //         }
                
        //     } catch (\Exception $e){      

        //     $mensaje = 'Ya no puedes guardar citas para esta fecha';
  
        //     return response()->json(['status' => 404,'message'=>$e->getMessage()]);
        // }  

    }
    public function grafico(){

        try {
            $data = DB::table('cita')
            ->select(DB::raw("COUNT(cita.IdCategoria) AS cantidad "), 'categoria.descripcion')
            ->join('categoria','cita.IdCategoria','=','categoria.IdCategoria')
            ->groupBy('cita.IdCategoria')
            ->get();
            
            //$data=array();
    
            return response()->json(['status' => 200,'result'=>$data]);

        } catch (\Exception $e){               
  
            return response()->json(['status' => 404,'message'=>$e->getMessage()]);
        }         

    }
}
