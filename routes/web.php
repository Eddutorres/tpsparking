<?php

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (){ 

    return view('welcome');
});

Route::get('registros', [RegistroController::class,'index']);
Route::get('registro/salida/{id}', [RegistroController::class,'regSalida'])->name('registro.salida');