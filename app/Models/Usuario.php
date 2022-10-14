<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


use \stdClass;

class Usuario extends Model
{
    use HasFactory;


    
    protected $primaryKey = 'IdUsuario';

   




    static  function login($username,$clave){            
        $result = new stdClass();     
 
         $exis=DB::table('usuario')->select('usuario.username')->where('usuario.username', $username)->first();
 
         if ($exis) {                
           $user = DB::table('usuario')         
           ->select('usuario.IdUsuario','usuario.username')     
           ->where('usuario.username', $username)     
           ->where('usuario.clave', $clave)         
           ->first();     
 
           if ($user) {
             
             $result->status = 200;
             $result->message = 'Ingreso con Exito';
             $result->user = $user;      
      
             return $result;     
 
           }else{
            
             $result->status = 400;
             $result->message = 'error clave';          
             return $result;
           }      
         }else{
 
           $result->status = 400;
           $result->message='Usuario no Existe';
           return $result;
         }         
          return null;           
   }

}
