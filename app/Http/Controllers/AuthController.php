<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


    public function login()
    {
        return view('login');
    }

    public function loginApp(Request $request)
    {

        $email = $request->email;
        $password = $request->password;

        $response = Http::post('http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/login?', [
            'email' => $email, 'password' => $password
        ]);
        $result = json_decode((string)$response->getBody(), true);
        //dd($result);
        if ($response->getStatusCode() != 200) {
            return back()->withErrors([
                'message' => 'Usuario o contraseña incorrecta, intentelo de nuevo',
            ]);
        } else {
            if ($result['user']['role'] == 'admin') {
                $this->result = $result['user']['name'];
                return view('registros/registroUsuario', ["result" => $this->result]);
            } else {
                return redirect()->to('login');
            }
        }
        //return dd($result);
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
