<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EstacionamientoController extends Controller
{
    public function buscarEst($codigo)
    {
        $estacionamientos = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/estacionamiento/'.$codigo)->json();

        return view('ingresos/formingreso', compact('estacionamientos'));
        //return dd($estacionamiento);
    }

}
