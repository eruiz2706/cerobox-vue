<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Cliente;

class ClienteController extends Controller
{
    public function obtenerTodos(){
        
        return response()->json([
            'clientes' => Cliente::all()
        ],200);
    }

    public function crear(Request $request){

        $file = $request->file('imagen');
        $nombreImagen = 'cliente'.date('ymdhis').'.'.$file->getClientOriginalExtension();
        $responseImg  =Storage::disk('public')->put($nombreImagen,  \File::get($file));

        if($responseImg){
            $cliente = Cliente::create([
                'nombre' => $request->nombre,
                'imagen' => $nombreImagen,
                'cedula' => $request->cedula,
                'email' => $request->email,
                'telefono' => $request->telefono,
                'observaciones' => $request->observaciones
            ]);
        }
        
        return response([
            'cliente' => $cliente
        ],200);
    }

    public function editar($id){
        return response([
            'cliente' => Cliente::find($id)
        ],200);
    }

    public function actualizar(Request $request){
        $cliente = Cliente::find($request->id);
        $cliente->nombre = $request->nombre;
        $cliente->imagen = $request->imagen;
        $cliente->cedula = $request->cedula;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->observaciones = $request->observaciones;
        $cliente->save();
        
    
        return response([
            'mensaje' => $request
        ],200);
    }

    public function eliminar(Request $request){
        $cliente = Cliente::destroy($request->id);
        
        return response([
            'mensaje' => $cliente,
            'id'=>$request->id
        ],200);
    }

}
