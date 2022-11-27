<?php

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\EstacionamientoController;


Route::get('/', function (){ return view('users.login');});
Route::get('/principal', function (){ return view('ingresos.inicio');});
Route::get('/estacionamientos', function (){ return view('estacionamientos.inicio');});
Route::get('/reportes', function (){ return view('reportes.reportes');});
Route::get('/ingresos', function (){return view('ingresos.inicio');})->name('ingreso.reg');
Route::get('patente', [RegistroController::class,'patenteReg'])->name('buscar.patente');
Route::get('ingreso', [RegistroController::class,'mostrarSec'])->name('mostrar.sec');
Route::get('salidas', [RegistroController::class,'buscarjoinId'])->name('editar.salida');
Route::get('cambiar', [RegistroController::class,'enviarId'])->name('cambiar.est');
Route::post('regingreso',[RegistroController::class, 'guardarReg'])->name('guardar.ingreso');
Route::put('salida', [RegistroController::class,'confirmarSalida'])->name('confirmar.salida');
Route::put('cambiarest', [RegistroController::class,'cambiarEst'])->name('cambiar.estacionamiento');

Route::get('est', [EstacionamientoController::class,'buscarEst'])->name('buscar.est');
Route::get('listarest', [EstacionamientoController::class,'listarEst'])->name('listar.est');
Route::delete('eliminarest', [EstacionamientoController::class,'eliminarEst'])->name('eliminar.est');
Route::post('agregarest', [EstacionamientoController::class,'agregarEst'])->name('agregar.est');


Route::get('persona', [PersonaController::class,'buscarRut'])->name('buscar.rut');

Route::get('reporte', [ReporteController::class,'crearReporte'])->name('crear.reporte');
Route::get('reporte/pdf', [ReporteController::class,'downloadPDF'])->name('descargar.pdf');