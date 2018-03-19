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

Route::get('/usuario/{user}', 'UsersController@show')->name('usuario/show');

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
Route::group([ 'prefix' => 'admin' ], function () {
  Route::get('/', function () {
    return view('adminHome');
  })->name('admin');

  Route::get('home', function () {
    return view('adminHome');
  })->name('admin/home');

  // RUTAS DE CLASES
  Route::group([ 'prefix' => 'clases' ], function () {
    Route::get('/', 'ClasesController@index')->name('admin/clases');

    Route::get('crear/', 'ClasesController@create')->name('admin/clases/crear');

    Route::post('createClase', 'ClasesController@store')->name('admin/createClase');

    Route::get('{clase}/editar', 'ClasesController@edit')->name('admin/clases/editar');

    Route::post('{clase}/updateClase', 'ClasesController@update')->name('admin/updateClase');

    Route::get('{clase}/deleteClase', 'ClasesController@destroy')->name('admin/deleteClase');

    Route::get('{clase}/restoreClase', 'ClasesController@restore')->name('admin/restoreClase');
  });

  //  RUTAS DE OBJETOS
  Route::group([ 'prefix' => 'objetos' ], function () {
    Route::get('/', 'ObjetosController@index')->name('admin/objetos');

    Route::get('crear', 'ObjetosController@create')->name('admin/objetos/crear');

    Route::post('createObjeto', 'ObjetosController@store')->name('admin/createObjeto');

    Route::get('{objeto}/editar', 'ObjetosController@edit')->name('admin/objetos/editar');

    Route::post('{objeto}/updateObjeto', 'ObjetosController@update')->name('admin/updateObjeto');

    Route::get('{objeto}/deleteObjeto', 'ObjetosController@destroy')->name('admin/deleteObjeto');

    Route::get('{objeto}/restoreObjeto', 'ObjetosController@restore')->name('admin/restoreObjeto');

    // Conjuntos
    Route::get('conjuntos', 'ConjuntosController@index')->name('admin/objetos/conjuntos');

    Route::get('conjuntos/crear', 'ConjuntosController@create')->name('admin/objetos/conjuntos/crear');

    Route::post('createConjunto', 'ConjuntosController@store')->name('admin/createConjunto');

    Route::get('conjuntos/{conjunto}/editar', 'ConjuntosController@edit')->name('admin/objetos/conjuntos/editar');

    Route::post('{conjunto}/updateConjunto', 'ConjuntosController@update')->name('admin/updateConjunto');

    Route::get('{conjunto}/deleteConjunto', 'ConjuntosController@destroy')->name('admin/deleteConjunto');

    Route::get('{conjunto}/restoreConjunto', 'ConjuntosController@restore')->name('admin/restoreConjunto');

    // Efectos de conjunto

    Route::get('conjuntos/efectos', function () {
      return view('admin_objetos_conjuntos_efectos');
    })->name('admin/objetos/conjuntos/efectos');

    Route::get('conjuntos/efectos/crear', function () {
      return view('forms.objeto_conjunto_efectos_create');
    })->name('admin/objetos/conjuntos/efectos/crear');

    Route::get('conjuntos/{conjunto}/efectos/editar', function () {
      return view('forms.objeto_conjunto_efectos_update');
    })->name('admin/objetos/conjuntos/efectos/editar');

    // Tipos
    Route::get('tipos', 'TipoObjetosController@index')->name('admin/objetos/tipos');

    Route::get('tipos/crear', 'TipoObjetosController@create')->name('admin/objetos/tipos/crear');

    Route::post('createTipoObjeto', 'TipoObjetosController@store')->name('admin/createTipoObjeto');

    Route::get('tipos/{tipo_objeto}/editar', 'TipoObjetosController@edit')->name('admin/objetos/tipos/editar');

    Route::post('{tipo_objeto}/updateTipoObjeto', 'TipoObjetosController@update')->name('admin/updateTipoObjeto');

    Route::get('{tipo_objeto}/deleteTipoObjeto', 'TipoObjetosController@destroy')->name('admin/deleteTipoObjeto');

    Route::get('{tipo_objeto}/restoreTipoObjeto', 'TipoObjetosController@restore')->name('admin/restoreTipoObjeto');

  });

  //  RUTAS DE HABILIDADES
  Route::group([ 'prefix' => 'habilidades' ], function () {
    Route::get('/', 'HabilidadesController@index')->name('admin/habilidades');

    Route::get('crear', 'HabilidadesController@create')->name('admin/habilidades/crear');

    Route::get('pasiva/crear', 'HabilidadesController@create')->name('admin/habilidades/pasiva/crear');

    Route::post('createHabilidad', 'HabilidadesController@store')->name('admin/createHabilidad');

    Route::get('{habilidad}/editar', 'HabilidadesController@edit')->name('admin/habilidades/editar');

    Route::post('{habilidad}/updateHabilidad', 'HabilidadesController@update')->name('admin/updateHabilidad');


    Route::get('{habilidad}/deleteHabilidad', 'HabilidadesController@destroy')->name('admin/deleteHabilidad');

    Route::get('{habilidad}/restoreHabilidad', 'HabilidadesController@restore')->name('admin/restoreHabilidad');

    // Runas
    Route::get('runas', 'RunasController@index')->name('admin/runas');

    Route::get('runas/crear', function () {
      return view('forms.runa_create');
    })->name('admin/habilidades/runas/crear');

    Route::get('runas/{runa}/editar', 'RunasController@edit')->name('admin/runas/editar');

    Route::post('runas/{runa}/updateRuna', 'RunasController@update')->name('admin/updateRuna');

    Route::get('runas/{runa}/deleteRuna', 'RunasController@destroy')->name('admin/deleteRuna');

    Route::get('runas/{runa}/restoreRuna', 'RunasController@restore')->name('admin/restoreRuna');
  });

  // RUTAS DE USUARIOS
  Route::group([ 'prefix' => 'usuarios' ], function () {
    Route::get('/', 'UsersController@index')->name('admin/usuarios');

    Route::get('crear', 'UsersController@create')->name('admin/usuarios/crear');

    Route::get('{usuario}/editar', 'UsersController@edit')->name('admin/usuarios/editar');

    Route::post('{usuario}/updateUser', 'UsersController@update')->name('admin/updateUser');

    Route::get('{usuario}/deleteUser', 'UsersController@destroy')->name('admin/deleteUser');

    Route::get('{usuario}/restoreUser', 'UsersController@restore')->name('admin/restoreUser');
  });

  // RUTAS DE GUÍAS
  Route::get('guias', function () {
    return view('admin_guias');
  })->name('admin/guias');

  Route::get('guias/crear', function () {
    return view('forms.guia_create');
  })->name('admin/guias/crear');

  Route::get('guias/{guia}/editar', function () {
    return view('forms.guia_update');
  })->name('admin/guias/editar');
});

Route::get('/home', 'HomeController@index')->name('home');
