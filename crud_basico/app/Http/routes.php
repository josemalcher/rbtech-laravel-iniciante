<?php

//Route::auth();
//Route::get('/','HomeController@index');
//Route::get('/home', 'HomeController@index');
//Route::get('/clientes','ClientesController@index');
//Route::get('/clientes/novo','ClientesController@novo');

Route::get('usuarios', 'UsuariosController@index');

Route::get('clientes', 'ClientesController@index');
Route::get('clientes/novo', 'ClientesController@novo');
Route::post('clientes/salvar', 'ClientesController@salvar');

Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'HomeController@index');
    Route::auth();
    Route::get('/home', 'HomeController@index');

});
