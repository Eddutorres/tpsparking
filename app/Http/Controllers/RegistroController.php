<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegistroController extends Controller
{
 
     public function store(Request $request){
         Http::post('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/registro',[
             'fecha'=>$request->fecha,
             'codigo_est'=>$request->codigo_est,
             'estado_est'=>$request->estado_est,
             'hora_ingreso'=>$request->hora_ingreso,
             'rut'=>$request->rut,
             'patente'=>$request->patente
         ]);
 
         return to_route('ingresos.inicio');
     }


    public function index(){
        
        $registros = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/registros')->json();
    
       return view('registros/index',compact('registros'));
    }

    public function mostrarEst(){

        $estacionamientos = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/joinest')->json();
    
       //return view('tema/grilla', compact('estacionamientos'));
       return view('tema/registros', compact('estacionamientos'));
       //return dd($estacionamientos);
    }
    
    public function mostrarSec(Request $estacionamientos){

        $sector = $estacionamientos->get('sector');
        $estacionamientos = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/joinest/'.$sector)->json();
    
       return view('ingresos/sector', compact('estacionamientos','sector'));
       //return dd($estacionamientos);
    }
    public function patenteReg(Request $patentes){

        $patente = $patentes->get('patente');
        $fecha = $patentes->get('fecha');
        $patentes = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/patentereg/'.$patente.'/'.$fecha)->json();
    
       return view('patente/buscarpatente', compact('patentes'));
       //return dd($estacionamientos);
    }

    public function edit($id){

        $registro = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/registro/'.$id)->json();
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
        $registros = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/registroPatente/'.$patente)->json();
        return view('registros/index',compact('registros'));
    }
    public function buscarrut(Request $registros){

        $rut = $registros->rut;
        $registros = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/registroRut/'.$rut)->json();
        return view('registros/index',compact('registros'));
    }
    public function buscarsector(Request $registros){

        $rut = $registros->rut;
        $registros = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/registroRut/'.$rut)->json();
        return view('registros/index',compact('registros'));
    }
}
