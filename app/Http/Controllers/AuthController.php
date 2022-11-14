<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{


public function login(){
    return view('login');
}

public function loginApp(Request $request){

    $email = $request->email;
    $password = $request->password;
    //dd($password);
    $response = Http::post('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/login',[
        'email'=>$email,'password'=>$password  
    ]);
    $result = json_decode((string)$response->getBody(),true);
    return dd($result);
    return view('login');

}

}
