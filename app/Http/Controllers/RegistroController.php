<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegistroController extends Controller
{
    public function index(){

        $response = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/todosRegistros')->json();
        return view('registros',compact('response'));
    }
    public function regSalida($id){

        $response = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/buscarIdRegistro/'.$id)->json();
        return view('salida',compact('response'));
    }

    public function post(){

       /*$response = Http::post('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/crearRegistro',[
            'fecha'=>'',
            'codigo_est'=>'',
            'hora_ingreso'=>'',
            'rut'=>'',
            'patente'=>''
        ])->json();*/
        return view('crearRegistro',compact('response'));
    }

    public function store(Request $request){
        Http::post('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/crearRegistro',[
            'fecha'=>$request->fecha,
            'codigo_est'=>$request->codigo_est,
            'hora_ingreso'=>$request->hora_ingreso,
            'rut'=>$request->rut,
            'patente'=>$request->patente
        ]);

        return to_route('registro.index');
    }

    

}
