<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegistroController extends Controller
{
 
     public function store(Request $request){
         Http::post('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/crearRegistro',[
             'fecha'=>$request->fecha,
             'codigo_est'=>$request->codigo_est,
             'hora_ingreso'=>$request->hora_ingreso,
             'rut'=>$request->rut,
             'patente'=>$request->patente
         ]);
 
         return to_route('todoslosregistros');
     }


    public function index(){
        
        $registros = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/todosRegistros')->json();
    
       return view('registros/index',compact('registros'));
    }
    public function edit($id){

        $registro = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/buscarIdRegistro/'.$id)->json();
        return view('registros/edit',compact('registro'));
    }
    public function confirmarSalida(Request $registro){

        $idregistro = $registro->id; 
        Http::put('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/registrarSalida/'.$idregistro,[
        'hora_salida' => $registro->hora_salida,
        ]);
        return to_route('todoslosregistros');

    }
    public function buscarpatente(Request $registros){

        $patente = $registros->patente;
        $registros = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/buscarPatenteRegistro/'.$patente)->json();
        return view('registros/index',compact('registros'));
    }
    public function buscarrut(Request $registros){

        $rut = $registros->rut;
        $registros = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/buscarRutRegistro/'.$rut)->json();
        return view('registros/index',compact('registros'));
    }

}
