<?php

//Route::auth();
//Route::get('/','HomeController@index');
//Route::get('/home', 'HomeController@index');
//Route::get('/clientes','ClientesController@index');
//Route::get('/clientes/novo','ClientesController@novo');

Route::get('usuarios', 'UsuariosController@index');

    Route::get('clientes', 'ClientesController@index');
    Route::get('clientes/novo', 'ClientesController@novo');
    Route::get('clientes/{cliente}/editar', 'ClientesController@editar');
    Route::post('clientes/salvar', 'ClientesController@salvar');
    Route::patch('clientes/{cliente}', 'ClientesController@atualizar');

Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'HomeController@index');
    Route::auth();
    Route::get('/home', 'HomeController@index');


});
