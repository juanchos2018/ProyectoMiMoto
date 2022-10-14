<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;
use App\Http\Controllers\DashboardController;


class AuthController extends Controller
{


    public function authenticate(Request $request){

        $result = Usuario::login($request->username,$request->clave);   
        if ($result->status==200) {
            
          
           return redirect()->action([DashboardController::class, 'index']);
             
        }else{                  
           return redirect()->back()->withErrors(['errors' => trans('auth.failed')]);
        }        
           
    }

}
