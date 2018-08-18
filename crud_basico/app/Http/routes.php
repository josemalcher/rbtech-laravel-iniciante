<?php
Route::auth();
Route::get('/','HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/clientes','ClientesController@index');
Route::get('/clientes/novo','ClientesController@novo');
