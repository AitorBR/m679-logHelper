<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ServerLogController;

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


// home
Route::get('/', function () {
    return view('/server/server');
});


// server
Route::get('/serverEdit', function () {
    return view('/server/server_edit');
});

Route::get('/serverCreate', function () {
    return view('/server/server_create');
});


// log
Route::get('/logCreate', function () {
    return view('/server/log_create');
});

Route::get('/logEdit', function () {
    return view('/server/log_edit');
});

Route::get('/serverlogShow', function () {
    return view('/server/serverLogs_show');
});

/*
Route::get('/create', function () {
    return view('/server/create_server');
});*/


/*
Route::get('/server', function () {
    return view('/api/v1/server');
});
*/

/*
Route::prefix('/server')->group(function () {
    Route::get('/', [ServerController::class, 'index'])
    ->name('server.mostrar');
    Route::get('/{id}', [ServerController::class, 'show'])
    ->name('server.mostrarId');
    Route::post('/storage/{id}', [LogController::class, 'storage'])
    ->name('server.generarDato');
    Route::destroy('/destroy/{id}', [LogController::class, 'destroy'])
    ->name('server.borratDato');
    Route::post('/update/{id}', [LogController::class, 'update'])
    ->name('server.actualizarDato');
});*/




