<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReporteController extends Controller
{
    public function crearReporte(Request $reportes){

        $sector = $reportes->get('sector');
        $fecha_ini = $reportes->get('fecha_ini');
        $fecha_fin = $reportes->get('fecha_fin');
        $reportes = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/reporte/'.$sector.'/'.$fecha_ini.'/'.$fecha_fin)->json();
    
       return view('reportes/crear', compact('reportes'));
       //return dd($estacionamientos);
    }
}
