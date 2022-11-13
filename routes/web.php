<?php

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

/*Route::get('/', function (){ 

    return view('welcome');
});*/


Route::get('/', [RegistroController::class,'index'])->name('todoslosregistros');
Route::get('registros/edit/{id}', [RegistroController::class,'edit'])->name('editarSalida');
Route::put('update/', [RegistroController::class,'confirmarSalida'])->name('guardarsalida');
Route::get('registros/crear', function (){ 

    return view('registros/create');
});
//Route::get('registros/crear',[RegistroController::class, 'post'])->name('registro.crearRegistro');
Route::post('registros/crear',[RegistroController::class, 'store'])->name('registro.store');
Route::get('registros/buscarpatente/', [RegistroController::class,'buscarpatente'])->name('buscarpatente');
Route::get('registros/buscarrut/', [RegistroController::class,'buscarrut'])->name('buscarrut');

Route::get('login', [AuthController::class,'login'])->name('login');
Route::post('loginApp', [AuthController::class,'loginApp'])->name('loginApp');