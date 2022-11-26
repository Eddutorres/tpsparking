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
 
         return to_route('todoslosregistros');
     }
     public function guardarReg(Request $ingreso){


        Http::post('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/registro',[
            'fecha'=>$ingreso->fecha,
            'codigo_est'=>$ingreso->codigo,
            'estado_est'=>$ingreso->estado_est,
            'hora_ingreso'=>$ingreso->hora_ingreso,
            'rut'=>$ingreso->rut,
            'patente'=>$ingreso->patente
        ]);

        $sector = $ingreso->get('sector');
        $fecha_reg = $ingreso->get('fecha_reg');

        $estacionamientos = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/estsector/'.$sector)->json();
        $registros = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/registroFecha/'.$fecha_reg)->json();

        foreach($estacionamientos as $k => $v){
            foreach($registros as $kk => $vv){
              if($v['codigo'] == $vv['codigo_est']){
                  foreach($vv as $key => $val){
                    $estacionamientos[$k][$key] = $val; 
                  }
              }
            }
         }

    
       return view('ingresos/sector', compact('estacionamientos','sector'));
        //return dd($ingreso);
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
        $fecha_reg = $estacionamientos->get('fecha_reg');

        $estacionamientos = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/estsector/'.$sector)->json();

        $registros = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/registroFecha/'.$fecha_reg)->json();

        foreach($estacionamientos as $k => $v){
            foreach($registros as $kk => $vv){
              if($v['codigo'] == $vv['codigo_est']){
                  foreach($vv as $key => $val){
                    $estacionamientos[$k][$key] = $val; 
                  }
              }
            }
         }

    
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

        $registros = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/registro/'.$id)->json();
        return view('salidas/formsalida',compact('registros'));
    }
    public function confirmarSalida(Request $registro){

        $idregistro = $registro->id; 
        Http::put('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/registrarSalida/'.$idregistro,[
        
        'estado_est' => $registro->estado_est,
        'hora_salida' => $registro->hora_salida,
        ]);
        $sector = $registro->get('sector');
        $fecha_reg = $registro->get('fecha_reg');

        $estacionamientos = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/estsector/'.$sector)->json();
        $registros = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/registroFecha/'.$fecha_reg)->json();

        foreach($estacionamientos as $k => $v){
            foreach($registros as $kk => $vv){
              if($v['codigo'] == $vv['codigo_est']){
                  foreach($vv as $key => $val){
                    $estacionamientos[$k][$key] = $val; 
                  }
              }
            }
         }

    
       return view('ingresos/sector', compact('estacionamientos','sector'));

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
    public function buscarjoinId(Request $registros){

        $sector = $registros->get('sector');
        $id = $registros->id;
        $registros = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/joinid/'.$id)->json();

        return view('salidas/formsalida',compact('registros','sector'));
        //return dd($registros);
    }
    public function cambiarEst(Request $registro){

        $idregistro = $registro->id; 
        Http::put('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/modificarUbicacion/'.$idregistro,[
        
        'codigo_est' => $registro->codigo_est,
        ]);
        $codigo_est = $registro->get('codigo_est');
        $ests = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/estacionamiento/'.$codigo_est)->json();
        foreach($ests as $est){
        $sector = $est['sector'];
        }
        $fecha_reg = $registro->get('fecha_reg');

        $estacionamientos = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/estsector/'.$sector)->json();
        $registros = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/registroFecha/'.$fecha_reg)->json();

        foreach($estacionamientos as $k => $v){
            foreach($registros as $kk => $vv){
              if($v['codigo'] == $vv['codigo_est']){
                  foreach($vv as $key => $val){
                    $estacionamientos[$k][$key] = $val; 
                  }
              }
            }
         }

    
       return view('ingresos/sector', compact('estacionamientos','sector'));

    }
    public function enviarId(Request $registro){

        $id= $registro->get('id');
        $sector= $registro->get('sector');
            
       return view('ingresos/cambiarest', compact('id','sector'));
       //return dd($estacionamientos);
    }
}
