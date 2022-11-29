<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegistroController extends Controller
{
 
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
        $estado_est = $patentes->get('estado_est');
        $patentes = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/registroPatente/'.$patente.'/'.$fecha.'/'.$estado_est)->json();
        foreach($patentes as $patente){
          $codigo = $patente['codigo_est'];
          $rut = $patente['rut'];
          }
        $estacionamientos = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/estacionamiento/'.$codigo)->json();

        $personas = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/buscarRut/'.$rut)->json();
        
    
       return view('patente/buscarpatente', compact('patentes','estacionamientos','personas'));
       //return dd($personas);
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

    public function buscarReg(Request $registro){

        $sector = $registro->get('sector');
        $rut = $registro->get('rut');
        $id = $registro->get('id');
        $registros = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/registro/'.$id)->json();
        
        $personas = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/buscarRut/'.$rut)->json();

       return view('salidas/formsalida',compact('registros','personas','sector'));
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
        $codigo= $registro->get('codigo');
            
       return view('ingresos/cambiarest', compact('id','sector', 'codigo'));
       //return dd($estacionamientos);
    }
}
