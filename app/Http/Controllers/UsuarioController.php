<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    //
    public function index()
    {
       // $usuarios = Usuario::get();
        return view('pages.usuario');
       // return $usuarios;
    }

    public function records(){

        $usuarios = Usuario::get();

        $empleados = DB::table('empleado')

        ->select('empleado.IdEmpleado','empleado.Nombres','empleado.Nombres')
        ->whereNotExists(function ($query) {
            $query->from('usuario')               
                ->where('usuario.IdEmpleado','=',DB::raw('empleado.IdEmpleado'));
        })
        ->get();
        return response()->json(['status' => 200,'result'=>$usuarios,'empleados'=>$empleados]);
        
    }
    public function store(Request $request)
    {
        try {
            $user =Usuario::where('nom_usuario',$request->usuario)->first();
            if ($user) {
                
                return response()->json(['status' => 400,'result'=>$user]);
            }else{
                $nivel ="A";
                if ($request->nivel=="Empleado") {
                    $nivel ="E";
                }
              
                $usuario = new Usuario();
                $usuario->nom_usuario = $request->usuario;
                $usuario->clave = $request->password;
                $usuario->estado = 'A';
                $usuario->IdEmpleado = $request->IdEmpleado;
                $usuario->nivel = $nivel;
                $usuario->save();
    
                return response()->json(['status' => 200,'result'=>$usuario]);
            }
      
        } catch (\Exception $e){               
  
            return response()->json(['status' => 404,'message'=>$e->getMessage()]);
        }  
       
       
    }
}
