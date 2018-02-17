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
    return view('forms.guia_create');
})->name('formularioCrearGuia');

// RUTAS DE VISUALIZAR GUIAS
Route::get('/guia/buscar', function () {
  return view('verGuias');
})->name('guia/buscar');
Route::get('/guia/{guia}', function () {
    return view('visualizarGuia');
})->name('guia/show');

// RUTAS DE USUARIO
Route::get('/usuario/ajustes', function () {
  return view('cambiarAjustes');
})->name('usuario/ajustes');

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

// ---------------- RUTAS DE ADMINISTRACIÓN ----------------
Route::get('/admin', function () {
  return view('adminHome');
})->name('admin');

Route::get('admin/home', function () {
  return view('adminHome');
})->name('admin/home');

// RUTAS DE CLASES
Route::get('admin/clases', function () {
  return view('admin_clases');
})->name('admin/clases');

Route::get('admin/clases/crear', function () {
  return view('forms.clase_create');
})->name('admin/clases/crear');

Route::get('admin/clases/{clase}/editar', function () {
  return view('forms.clase_update');
})->name('admin/clases/editar');

//  RUTAS DE OBJETOS
Route::get('admin/objetos', function () {
  return view('admin_objetos');
})->name('admin/objetos');

Route::get('admin/objetos/crear', function () {
  return view('forms.objeto_create');
})->name('admin/objetos/crear');

Route::get('admin/objetos/{objeto}/editar', function () {
  return view('forms.objeto_update');
})->name('admin/objetos/editar');

Route::get('admin/objetos/conjuntos', function () {
  return view('admin_objetos_conjuntos');
})->name('admin/objetos/conjuntos');

Route::get('admin/objetos/conjuntos/crear', function () {
  return view('forms.objeto_conjunto_create');
})->name('admin/objetos/conjuntos/crear');

Route::get('admin/objetos/conjuntos/{conjunto}/editar', function () {
  return view('forms.objeto_conjunto_update');
})->name('admin/objetos/conjuntos/editar');

Route::get('admin/objetos/conjuntos/efectos', function () {
  return view('admin_objetos_conjuntos_efectos');
})->name('admin/objetos/conjuntos/efectos');

Route::get('admin/objetos/conjuntos/efectos/crear', function () {
  return view('forms.objeto_conjunto_efectos_create');
})->name('admin/objetos/conjuntos/efectos/crear');

Route::get('admin/objetos/conjuntos/{conjunto}/efectos/editar', function () {
  return view('forms.objeto_conjunto_efectos_update');
})->name('admin/objetos/conjuntos/efectos/editar');

//  RUTAS DE HABILIDADES
Route::get('admin/habilidades', function () {
  return view('admin_habilidades');
})->name('admin/habilidades');

Route::get('admin/habilidades/crear', function () {
  return view('forms.habilidad_create');
})->name('admin/habilidades/crear');

Route::get('admin/habilidades/{habilidad}/editar', function () {
  return view('forms.habilidad_update');
})->name('admin/habilidades/editar');

Route::get('admin/habilidades/runas', function () {
  return view('admin_runas');
})->name('admin/habilidades/runas');

Route::get('admin/habilidades/runas/crear', function () {
  return view('forms.runa_create');
})->name('admin/habilidades/runas/crear');

Route::get('admin/habilidades/runas/{objeto}/editar', function () {
  return view('forms.runa_update');
})->name('admin/habilidades/runas/editar');

// RUTAS DE USUARIOS
Route::get('admin/usuarios', 'UsersController@index')->name('admin/usuarios');

Route::get('admin/usuarios/crear', 'UsersController@create')->name('admin/usuarios/crear');

Route::get('admin/usuarios/{usuario}/editar', 'UsersController@edit')->name('admin/usuarios/editar');

Route::post('admin/updateUser/{usuario}', 'UsersController@update')->name('admin/updateUser');

Route::get('admin/deleteUser/{usuario}', 'UsersController@destroy')->name('admin/deleteUser');

Route::get('admin/restoreUser/{user_id}', 'UsersController@restore')->name('admin/restoreUser');

// RUTAS DE GUÍAS
Route::get('admin/guias', function () {
  return view('admin_guias');
})->name('admin/guias');

Route::get('admin/guias/crear', function () {
  return view('forms.guia_create');
})->name('admin/guias/crear');

Route::get('admin/guias/{guia}/editar', function () {
  return view('forms.guia_update');
})->name('admin/guias/editar');

Route::get('/home', 'HomeController@index')->name('home');
