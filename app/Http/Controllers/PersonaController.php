<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PersonaController extends Controller
{

    public function buscarRut(Request $personas){

        $rut = $personas->rut;
        $codigo = $personas->get('codigo');
        $rut = $personas->get('rut');
        $personas = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/buscarRut/'.$rut)->json();

        $patentes = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/patenteRut/'.$rut)->json();

        return view('register/patente',compact('personas','codigo','patentes'));
}
}