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
    return view('welcome');
    // return view('home');
})->name('/');

Auth::routes();

//  RUTAS DE CREAR GUÍA
Route::get('/crearGuia', function () {
    return view('crearGuia');
})->name('crearGuia');
Route::get('/crearGuia/formularioCrearGuia', function () {
    return view('formularioCrearGuia');
})->name('formularioCrearGuia');

// RUTAS DE VISUALIZAR GUIAS
Route::get('/verGuias', function () {
  return view('verGuias');
})->name('verGuias');
Route::get('/verGuias/guia/{guia}', function () {
    return view('visualizarGuia');
})->name('guia/show');

Route::get('/home', 'HomeController@index')->name('home');
