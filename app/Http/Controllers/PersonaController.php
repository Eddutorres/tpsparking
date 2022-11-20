<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PersonaController extends Controller
{

    public function buscarRut(Request $personas){

        $rut = $personas->rut;
        $codigo = $personas->get('codigo');
        $personas = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/buscarRut/'.$rut)->json();
        return view('register/enviar',compact('personas','codigo'));
}
}