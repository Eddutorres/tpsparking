<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function buscarPatente(Request $request){

        if ($request->ajax()){
            $patentes = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/patenteRut/'.$rut);
            foreach ($patentes as $patente){
                $patenteArray[$patente->pat_id] = $patente->patente;
            }
        }
        return response()->json($patenteArray);
}

public function get()
{
    $patentes = Http::get('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/patenteRut/'.$rut);
    $patenteArray[''] = 'Selecciona una patente';
    foreach ($patentes as $patente){
        $patenteArray[$patente->pat_id] = $patente->patente;
    }
    return $patenteArray;

}

}
