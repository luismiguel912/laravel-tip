<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/user')->group(function (){
    // Ruta para crear un nuevo usuario
    Route::POST('/save','UserController@save');
    // Ruta para obtener todos los usuarios
    Route::GET('/all','UserController@index');
    // Ruta para obtener un usuario por su id
    Route::GET('/{user_id}','UserController@show');
    // Ruta para actualizar un usuario por su id
    Route::PUT('/update/{user}','UserController@update');

    Route::GET('name/{name}','UserController@getUserByName');
});
