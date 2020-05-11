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

Route::get('/', 'Controller@welcome')->name('/');

Auth::routes();

//  RUTAS DE CREAR GUÍA
Route::group([ 'prefix' => 'crearGuia' ], function() {
  Route::get('/', 'GuiasController@create')->name('crearGuia')->middleware('auth');

  Route::get('{clase}/formularioCrearGuia', 'GuiasController@create')->name('formularioCrearGuia')->middleware('auth');

  Route::post('createGuia', 'GuiasController@store')->name('createGuia')->middleware('auth');
});

// RUTAS DE VISUALIZAR GUIAS
Route::group([ 'prefix' => 'guia' ], function() {
  Route::get('/', 'GuiasController@index')->name('guia');
  Route::get('buscar', 'GuiasController@index')->name('guia/buscar');
  Route::get('{guia}', 'GuiasController@show')->name('guia/show');
  Route::post('like', 'VotosPositivosController@store')->name('createVoto')->middleware('auth');
  Route::post('{voto_positivo}/dislike', 'VotosPositivosController@destroy')->name('deleteVoto')->middleware('auth');
  Route::post('comentario', 'ComentariosController@store')->name('createComentario')->middleware('auth');
  Route::get('{guia}/editar', 'GuiasController@edit')->name('editarGuia')->middleware('auth');
  Route::post('{guia}/updateGuia', 'GuiasController@update')->name('updateGuia')->middleware('auth');
});

// RUTAS DE USUARIO
Route::group([ 'prefix' => 'usuario' ], function() {
  Route::get('{usuario}', 'UsersController@show'
  )->name('usuario/show');

  Route::get('{usuario}/guias_publi', 'UsersController@show')->name('usuario/guias_publi');

  Route::get('{usuario}/comentarios', 'UsersController@show'
  )->name('usuario/comentarios');

  Route::get('{usuario}/favoritas', 'UsersController@show'
  )->name('usuario/favoritas');

  Route::get('{usuario}/ajustes', 'UsersController@edit')->name('usuario/ajustes')->middleware('auth');

  Route::post('{usuario}/updateUsuario', 'UsersController@update')->name('updateUsuario')->middleware('auth');
});

// ---------------- RUTAS DE ADMINISTRACIÓN ----------------
Route::group([ 'prefix' => 'admin', 'middleware' => [ 'auth', 'admin' ] ], function () {
  Route::get('/', function () {
    return view('adminHome');
  })->name('admin');

  Route::get('home', function () {
    return view('adminHome');
  })->name('admin/home');

  // RUTAS DE GUÍAS
  Route::group([ 'prefix' => 'guia' ], function() {
    Route::get('/', 'GuiasController@index')->name('admin/guias');

    Route::get('crear', function () {
      return view('forms.guia_create');
    })->name('admin/guias/crear');

    Route::get('{guia}/editar', function () {
      return view('forms.guia_update');
    })->name('admin/guias/editar');

    Route::get('{guia}/deleteGuia', 'GuiasController@destroy')->name('admin/deleteGuia');

    Route::get('{guia}/restoreGuia', 'GuiasController@restore')->name('admin/restoreGuia');
  });

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
    Route::group([ 'prefix' => 'conjuntos'  ], function() {
      Route::get('/', 'ConjuntosController@index')->name('admin/objetos/conjuntos');

      Route::get('crear', 'ConjuntosController@create')->name('admin/objetos/conjuntos/crear');

      Route::post('createConjunto', 'ConjuntosController@store')->name('admin/createConjunto');

      Route::get('{conjunto}/editar', 'ConjuntosController@edit')->name('admin/objetos/conjuntos/editar');

      Route::post('{conjunto}/updateConjunto', 'ConjuntosController@update')->name('admin/updateConjunto');

      Route::get('{conjunto}/deleteConjunto', 'ConjuntosController@destroy')->name('admin/deleteConjunto');

      Route::get('{conjunto}/restoreConjunto', 'ConjuntosController@restore')->name('admin/restoreConjunto');

      // Efectos de conjunto
      Route::group([ 'prefix' => 'efectos' ], function() {
        Route::get('/', 'EfectoConjuntosController@index')->name('admin/objetos/conjuntos/efectos');

        Route::get('crear', 'EfectoConjuntosController@create')->name('admin/objetos/conjuntos/efectos/crear');

        Route::post('createEfectoConjunto', 'EfectoConjuntosController@store')->name('admin/createEfectoConjunto');

        Route::get('{efecto_conjunto}/editar', 'EfectoConjuntosController@edit')->name('admin/objetos/conjuntos/efectos/editar');

        Route::post('{efecto_conjunto}/updateEfectoConjunto', 'EfectoConjuntosController@update')->name('admin/updateEfectoConjunto');

        Route::get('{efecto_conjunto}/deleteEfectoConjunto', 'EfectoConjuntosController@destroy')->name('admin/deleteEfectoConjunto');

        Route::get('{efecto_conjunto}/restoreEfectoConjunto', 'EfectoConjuntosController@restore')->name('admin/restoreEfectoConjunto');
      });

      // Tipos
      Route::group([ 'prefix' => 'tipos' ], function() {
        Route::get('/', 'TipoObjetosController@index')->name('admin/objetos/tipos');

        Route::get('crear', 'TipoObjetosController@create')->name('admin/objetos/tipos/crear');

        Route::post('createTipoObjeto', 'TipoObjetosController@store')->name('admin/createTipoObjeto');

        Route::get('{tipo_objeto}/editar', 'TipoObjetosController@edit')->name('admin/objetos/tipos/editar');

        Route::post('{tipo_objeto}/updateTipoObjeto', 'TipoObjetosController@update')->name('admin/updateTipoObjeto');

        Route::get('{tipo_objeto}/deleteTipoObjeto', 'TipoObjetosController@destroy')->name('admin/deleteTipoObjeto');

        Route::get('{tipo_objeto}/restoreTipoObjeto', 'TipoObjetosController@restore')->name('admin/restoreTipoObjeto');
      });
    });
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
  /* Cierre mal ubicado, corregido por Daniel Arturo Restrepo Camacho, muchas gracias, Dani */
});

Route::get('/tutorial', function () {
  return view('tutorial');
})->name('tutorial');

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/mailable', function () {
//     return new App\Mail\TestMail();
// });
