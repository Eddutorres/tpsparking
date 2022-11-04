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


}
