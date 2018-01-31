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
Route::get('/guia/buscar', function () {
  return view('verGuias');
})->name('guia/buscar');
Route::get('/guia/{guia}', function () {
    return view('visualizarGuia');
})->name('guia/show');

// RUTAS DE USUARIO
Route::get('/usuario/{user}', function () {
  return view('visualizarUsuario');
})->name('usuario/show');

Route::get('/usuario/{user}/guias', function () {
  return view('visualizarUsuario');
})->name('usuario/guias');

Route::get('/usuario/{user}/comentarios', function () {
  return view('visualizarUsuario');
})->name('usuario/comentarios');

Route::get('/usuario/{user}/favoritas', function () {
  return view('visualizarUsuario');
})->name('usuario/favoritas');

Route::get('/home', 'HomeController@index')->name('home');
