<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use GuzzleHttp\Client;

class logincontroller extends Controller
{
    public $result;
    public function login()
    {
        return view('login');
    }

    public function iniciarSesion(Request $request)
    {
        $http = new Client(['http_errors' => false]);
        //$username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $response = $http->post('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/login?', [
            'headers' => [
                'Authorization' => 'Bearer' . session()->get('token.access_token')
            ],
            'query' => [
                'email' => $email,
                'password' => $password
            ]
        ]);
        $result = json_decode((string)$response->getBody(), true);
                
        if ($response->getStatusCode() != 200) {
            return back()->withErrors([
                'message' => 'Usuario o contraseña incorrecta, intentelo de nuevo',
            ]);
        } else {
            if ($result['user']['role'] == 'admin') {
                $this->result = $result['user']['name'];
                return view('dashboard', ["result" => $this->result]);
            } else {
                return redirect()->to('login');
            }
        }
    }
}
