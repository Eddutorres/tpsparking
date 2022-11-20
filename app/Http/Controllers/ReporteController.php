<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ReporteController extends Controller
{
    public function crearReporte(Request $reportes){

        $sector = $reportes->get('sector');
        $fecha_ini = $reportes->get('fecha_ini');
        $fecha_fin = $reportes->get('fecha_fin');
        $reportes = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/reporte/'.$sector.'/'.$fecha_ini.'/'.$fecha_fin)->json();
    
       return view('reportes/crear', compact('reportes','sector','fecha_ini','fecha_fin'));
       //return dd($estacionamientos);
    }

    public function downloadPDF(Request $reportes)
    {
        $sector = $reportes->get('sector');
        $fecha_ini = $reportes->get('fecha_ini');
        $fecha_fin = $reportes->get('fecha_fin');
        $reportes = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/reporte/'.$sector.'/'.$fecha_ini.'/'.$fecha_fin)->json();
        $pdf = PDF::loadview('reportes.pdf',['reportes'=>$reportes]);
        return $pdf -> download('reporte.pdf');

    }

}
