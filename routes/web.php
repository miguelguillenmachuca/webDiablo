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
  Route::get('objetos', function () {
    return view('admin_objetos');
  })->name('admin/objetos');

  Route::get('objetos/crear', function () {
    return view('forms.objeto_create');
  })->name('admin/objetos/crear');

  Route::get('objetos/{objeto}/editar', function () {
    return view('forms.objeto_update');
  })->name('admin/objetos/editar');

  Route::get('objetos/conjuntos', function () {
    return view('admin_objetos_conjuntos');
  })->name('admin/objetos/conjuntos');

  Route::get('objetos/conjuntos/crear', function () {
    return view('forms.objeto_conjunto_create');
  })->name('admin/objetos/conjuntos/crear');

  Route::get('objetos/conjuntos/{conjunto}/editar', function () {
    return view('forms.objeto_conjunto_update');
  })->name('admin/objetos/conjuntos/editar');

  Route::get('objetos/conjuntos/efectos', function () {
    return view('admin_objetos_conjuntos_efectos');
  })->name('admin/objetos/conjuntos/efectos');

  Route::get('objetos/conjuntos/efectos/crear', function () {
    return view('forms.objeto_conjunto_efectos_create');
  })->name('admin/objetos/conjuntos/efectos/crear');

  Route::get('objetos/conjuntos/{conjunto}/efectos/editar', function () {
    return view('forms.objeto_conjunto_efectos_update');
  })->name('admin/objetos/conjuntos/efectos/editar');

  //  RUTAS DE HABILIDADES
  Route::group([ 'prefix' => 'habilidades' ], function () {
    Route::get('/', 'HabilidadesController@index')->name('admin/habilidades');

    Route::get('crear', function () {
      return view('forms.habilidad_create');
    })->name('admin/habilidades/crear');

    Route::get('crear_pasiva', function () {
      return view('forms.habilidad_create');
    })->name('admin/habilidades/crear_pasiva');

    Route::get('{habilidad}/editar', function () {
      return view('forms.habilidad_update');
    })->name('admin/habilidades/editar');

    Route::get('runas', function () {
      return view('admin_runas');
    })->name('admin/habilidades/runas');

    Route::get('runas/crear', function () {
      return view('forms.runa_create');
    })->name('admin/habilidades/runas/crear');

    Route::get('runas/{objeto}/editar', function () {
      return view('forms.runa_update');
    })->name('admin/habilidades/runas/editar');
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
