<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EstacionamientoController extends Controller
{
    public function buscarEst(Request $estacionamientos)
    {
        $codigo = $estacionamientos->get('codigo');
        $estacionamientos = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/estacionamiento/'.$codigo)->json();

        return view('register/rut', compact('estacionamientos'));
        //return dd($estacionamiento);
    }

    public function listarEst(Request $estacionamientos)
    {
        $sector = $estacionamientos->get('sector');
        $estacionamientos = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/estsector/'.$sector)->json();

        return view('estacionamientos/listar', compact('estacionamientos'));
        //return dd($estacionamiento);
    }
    public function agregarEst(Request $request){
        
        $sector = $request->get('sector');
        Http::post('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/estacionamiento',[
            'codigo'=>$request->codigo,
            'sector'=>$request->sector
        ]);

        $estacionamientos = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/estsector/'.$sector)->json();

        return view('estacionamientos/listar', compact('estacionamientos'));
    }
    public function eliminarEst(Request $request){
        
        $sector = $request->get('sector');
        $est_id = $request->est_id;
        //return dd($sector);
        Http::delete('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/estacionamiento/'.$est_id);

        $estacionamientos = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/estsector/'.$sector)->json();

        return view('estacionamientos/listar', compact('estacionamientos'));
    }

}
