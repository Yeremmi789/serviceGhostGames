<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('registros', [AuthController::class, 'registrarse']);
Route::post('iniciar', [AuthController::class, 'login']);

Route::get("prueba", [AuthController::class, 'pruebas']);



Route::group(['middleware' => 'auth:sactum'], function(){

});
