<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Hashids;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::bind('usuario', function($value, $route)
        {
          $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

          try
          {
            $id = $hashids->decode($value)[0];
          }
          catch (\Exception $e)
          {
            abort(404);
          }

          return \App\User::withTrashed()->findOrFail($id);
        });

        Route::bind('clase', function($value, $route)
        {
          $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

          try
          {
            $id = $hashids->decode($value)[0];
          }
          catch (\Exception $e)
          {
            abort(404);
          }

          return \App\Clase::withTrashed()->findOrFail($id);
        });

        Route::bind('habilidad', function($value, $route)
        {
          $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

          try
          {
            $id = $hashids->decode($value)[0];
          }
          catch (\Exception $e)
          {
            abort(404);
          }

          return \App\Habilidad::withTrashed()->findOrFail($id);
        });

        Route::bind('runa', function($value, $route)
        {
          $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

          try
          {
            $id = $hashids->decode($value)[0];
          }
          catch (\Exception $e)
          {
            abort(404);
          }

          return \App\Runa::withTrashed()->findOrFail($id);
        });

        Route::bind('conjunto', function($value, $route)
        {
          $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

          try
          {
            $id = $hashids->decode($value)[0];
          }
          catch (\Exception $e)
          {
            abort(404);
          }

          return \App\Conjunto::withTrashed()->findOrFail($id);
        });

        Route::bind('objeto', function($value, $route)
        {
          $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

          try
          {
            $id = $hashids->decode($value)[0];
          }
          catch (\Exception $e)
          {
            abort(404);
          }

          return \App\Objeto::withTrashed()->findOrFail($id);
        });

        Route::bind('tipo_objeto', function($value, $route)
        {
          $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

          try
          {
            $id = $hashids->decode($value)[0];
          }
          catch (\Exception $e)
          {
            abort(404);
          }

          return \App\TipoObjeto::withTrashed()->findOrFail($id);
        });

        Route::bind('efecto_conjunto', function($value, $route)
        {
          $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

          try
          {
            $id = $hashids->decode($value)[0];
          }
          catch (\Exception $e)
          {
            abort(404);
          }

          return \App\EfectoConjunto::withTrashed()->findOrFail($id);
        });

        Route::bind('guia', function($value, $route)
        {
          $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

          try
          {
            $id = $hashids->decode($value)[0];
          }
          catch (\Exception $e)
          {
            abort(404);
          }

          return \App\Guia::withTrashed()->findOrFail($id);

        });

        Route::bind('voto_positivo', function($value, $route)
        {
          $hashids = new Hashids\Hashids('No se me ocurre una salt, soy muy original', 10);

          try
          {
            $id = $hashids->decode($value)[0];
          }
          catch (\Exception $e)
          {
            abort(404);
          }

          return \App\VotoPositivo::withTrashed()->findOrFail($id);
        });

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
