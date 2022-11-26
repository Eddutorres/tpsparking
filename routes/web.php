<?php

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\VehiculoController;
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

    return view('ingresos.inicio');
});
Route::get('/estacionamientos', function (){ 

    return view('estacionamientos.inicio');
});
Route::get('/reportes', function (){ 

    return view('reportes.reportes');
});
Route::get('/patente', function (){ 

    return view('patente.buscarpatente');
});

Route::get('cambiar', [RegistroController::class,'enviarId'])->name('cambiarest');
Route::get('/ingresos', function (){return view('ingresos.inicio');})->name('ingresoreg');
//Route::get('/salidas', function (){ return view('salidas.formsalida');})->name('salidas');

//Route::get('/', [RegistroController::class,'mostrarEst'])->name('mostrarest');
Route::put('cambiarest', [RegistroController::class,'cambiarEst'])->name('cambiar.estacionamiento');
Route::get('salidas', [RegistroController::class,'buscarjoinId'])->name('editarSalida');
Route::get('persona', [PersonaController::class,'buscarRut'])->name('buscarrut');
Route::get('reporte/pdf', [ReporteController::class,'downloadPDF'])->name('descargar-pdf');
Route::get('est', [EstacionamientoController::class,'buscarEst'])->name('buscarest');
Route::get('listarest', [EstacionamientoController::class,'listarEst'])->name('listarest');
Route::post('agregarest', [EstacionamientoController::class,'agregarEst'])->name('agregarest');
Route::delete('eliminarest', [EstacionamientoController::class,'eliminarEst'])->name('eliminarest');
Route::get('reporte', [ReporteController::class,'crearReporte'])->name('crear.reporte');
Route::get('ingreso', [RegistroController::class,'mostrarSec'])->name('mostrarsec');
Route::get('registros', [RegistroController::class,'index'])->name('todoslosregistros');
Route::get('registros/edit/{id}', [RegistroController::class,'edit'])->name('editarSalida2');
Route::put('salida', [RegistroController::class,'confirmarSalida'])->name('confirmarsalida');
Route::get('registros/crear', function (){ 

    return view('registros/create');
});
//Route::get('registros/crear',[RegistroController::class, 'post'])->name('registro.crearRegistro');
Route::post('regingreso',[RegistroController::class, 'guardarReg'])->name('guardar.ingreso');
Route::post('registros/crear',[RegistroController::class, 'store'])->name('registro.store');
Route::get('patente', [RegistroController::class,'patenteReg'])->name('buscarpatente');
Route::get('registros/buscarrut/', [RegistroController::class,'buscarrut'])->name('buscarrut1');

Route::get('login', [AuthController::class,'login'])->name('login');
Route::post('loginApp', [AuthController::class,'loginApp'])->name('loginApp');
Route::get('/patentes', 'VehiculoController@buscarPatente');