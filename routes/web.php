<?php

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
    return view('app');
});

Route::prefix('auth')->group(function(){
    Route::post('init','UsuarioController@getUser');
    Route::post('login','UsuarioController@login');
    Route::post('logout','UsuarioController@logout');
});

Route::prefix('clientes')->group(function(){
    Route::get('listado','ClienteController@obtenerTodos');
    Route::get('editar/{id}','ClienteController@editar');
    Route::post('crear','ClienteController@crear');
    Route::put('actualizar','ClienteController@actualizar');
    Route::delete('eliminar/{id}','ClienteController@eliminar');
});

