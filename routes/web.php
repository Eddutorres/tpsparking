<?php

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\EstacionamientoController;
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

    return view('users.login');
});

Route::get('/principal', function (){ 

    return view('tema.principal');
});
Route::get('/reportes', function (){ 

    return view('reportes.reportes');
});
Route::get('/patente', function (){ 

    return view('patente.buscarpatente');
});
Route::get('/ingresos', function (){ 

    return view('ingresos.inicio');
});


//Route::get('/', [RegistroController::class,'mostrarEst'])->name('mostrarest');
Route::get('est/{codigo}', [EstacionamientoController::class,'buscarEst'])->name('buscarest');
Route::get('reporte', [ReporteController::class,'crearReporte'])->name('crear.reporte');
Route::get('ingreso', [RegistroController::class,'mostrarSec'])->name('mostrarsec');
Route::get('registros', [RegistroController::class,'index'])->name('todoslosregistros');
Route::get('registros/edit/{id}', [RegistroController::class,'edit'])->name('editarSalida');
Route::put('update/', [RegistroController::class,'confirmarSalida'])->name('guardarsalida');
Route::get('registros/crear', function (){ 

    return view('registros/create');
});
//Route::get('registros/crear',[RegistroController::class, 'post'])->name('registro.crearRegistro');
Route::post('registros/crear',[RegistroController::class, 'store'])->name('registro.store');
Route::get('patente', [RegistroController::class,'patenteReg'])->name('buscarpatente');
Route::get('registros/buscarrut/', [RegistroController::class,'buscarrut'])->name('buscarrut');

Route::get('login', [AuthController::class,'login'])->name('login');
Route::post('loginApp', [AuthController::class,'loginApp'])->name('loginApp');