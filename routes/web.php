<?php

use App\Http\Controllers\ParticipacionProcesoController;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\IncidenciaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/participantes/{proceso_id?}/{ciclo?}/list/{valoracion_id?}', [ParticipacionProcesoController::class, 'index'])->name('participantes.list');
Route::get('/participantes/detalle-proceso/{participacion_id?}', [ParticipacionProcesoController::class, 'detail'])->name('participantes.detail-proceso');
Route::get('/participantes/detalles/{participante_id?}', [ParticipanteController::class, 'details'])->name('participantes.details');
Route::post('/participantes/buscar', [ParticipanteController::class, 'search'])->name('participantes.buscar');
Route::get('/participantes/incidencias/{participante_id?}/{participacion_id?}', [IncidenciaController::class, 'create'])->name('participantes.incidencias');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');