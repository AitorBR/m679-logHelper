<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ServerLogController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/*
Route::apiResource('Server', ServerController::class)->except([
    'edit','create'
]);*/
/*
Route::apiResource('Log', LogController::class)->only([
    'index','show'
]);

Route::apiResource('ServerLog', ServerLogController::class)->except([
    'show','edit','create'
]);*/



Route::prefix('/server')->group(function () {
    Route::get('/index', [ServerController::class, 'index'])
        ->name('server.mostrar');
    Route::get('/show/{id}', [ServerController::class, 'show'])
        ->name('server.mostrarId');
    Route::post('/storage', [ServerController::class, 'store'])
        ->name('server.generarDato');
    Route::get('/destroy/{id}', [ServerController::class, 'destroy'])
        ->name('server.borratDato');
    Route::patch('/update/{id}', [ServerController::class, 'update'])
        ->name('server.actualizarDato');

    // serverlog controller
    Route::get('/{idServer}/serverlog/index', [ServerLogController::class, 'index'])
        ->name('serverlog.mostrar');
    Route::post('/{idServer}/serverlog/store', [ServerLogController::class, 'store'])
        ->name('serverlog.mostrarId');
    Route::patch('/{idServer}/serverlog/update/{idLog}', [ServerLogController::class, 'update'])
        ->name('serverlog.actualizarLog');
    Route::get('/{idServer}/serverlog/destroy/{idLog}', [ServerLogController::class, 'destroy']) // con delete no funciona
        ->name('serverlog.borrarDato');
    /* Route::get('/{idserver]/serverlog/index', [ServerLogController::class, 'index'])
        ->name('serverlog.mostrar');*/
});

Route::prefix('/log')->group(function () {
    Route::get('/index', [LogController::class, 'index'])
        ->name('log.mostrar');
    Route::get('/show/{id}', [LogController::class, 'show'])
        ->name('log.mostrarId');
});

/*
Route::prefix('/server/{idserver]/serverlog')->group(function () {
    Route::get('/index', [ServerLogController::class, 'index'])
        ->name('serverlog.mostrar');
    Route::get('/storage', [ServerLogController::class, 'storage'])
        ->name('serverlog.mostrarId');
    Route::get('/update/{idLog}', [ServerLogController::class, 'update'])
        ->name('serverlog.actualizarLog');
    Route::get('/destroy', [ServerLogController::class, 'destroy'])
        ->name('serverlog.borrarDato');
});*/

/*
Route::prefix('/serverlog')->group(function () {
    Route::get('/index/{idServer}', [ServerLogController::class, 'index'])
        ->name('serverlog.mostrar');
    Route::post('/storage/{idServer}', [ServerLogController::class, 'store'])
        ->name('serverlog.mostrarId');
    Route::put('/update/{idServer}/{idLog}', [ServerLogController::class, 'update'])
        ->name('serverlog.actualizarLog');
    Route::get('/destroy/{idServer}/{idLog}', [ServerLogController::class, 'destroy']) // con delete no funciona
        ->name('serverlog.borrarDato');
});
*/
