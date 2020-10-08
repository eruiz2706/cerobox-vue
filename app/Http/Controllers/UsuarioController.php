<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UsuarioController extends Controller
{
    public function getUser(){
        $jsonresponse=[
            'user'=>Auth::user()
        ];
        return response()->json($jsonresponse,200);
    }

    public function login(Request $request){
        //$request->ajax()
        
        if(Auth::attempt(['email' => $request->email,'password'=>$request->clave],false)){
            $jsonresponse=[
                'user'=>Auth::user()
            ];
            return response()->json($jsonresponse,200);
        }else{
            return response()->json([
                'error' => 'Email o contraseña incorrecto'
            ],400);
        }
    }

    public function logout(){
        Auth::logout();
    } 
}
