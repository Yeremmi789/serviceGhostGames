<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GamesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function(){
    return response()->json([
        "Intente ingresar a las rutas:",
        "api/registros",
        "api/iniciar",
        "api/prueba",
        "etc..."
    ]);
});

Route::post('registros', [AuthController::class, 'registrarse']);
Route::post('iniciar', [AuthController::class, 'login']);

Route::get("prueba", [AuthController::class, 'pruebas']);


// TAMBIEN PUEDO LIMITAR EL ACCESO EN ESTAS RUTAS, DEPENDIENDO AL ROLL QUE TENGA CADA USUARIO EN LA base de datos :0
Route::group(['middleware' => 'auth:sanctum'], function(){
    
    // Usuarios
    Route::get("pruebaToken", [AuthController::class, 'pruebasLogeado']);
    Route::get("listUsers", [AuthController::class, 'userList']);

    // Juegos
    Route::post("newJuego", [GamesController::class, 'new_juego']);
    Route::get("listGames", [GamesController::class, 'gameList']);
});

// Route::middleware('auth:sanctum')->get('/listUsers', [AuthController::class, 'userList']);