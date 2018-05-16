<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Storage;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function saveFile(Request $request, $ruta_propuesta, $visibility = 'public')
    {
      if($visibility == 'private')
      {
        // Add time to make the name truly unique
        $nombre_archivo = time() .$request->file('foto')->getClientOriginalName();

        // Save the file in the filesystem
        $ruta = Storage::putFileAs($ruta_propuesta, $request->file('foto'), $nombre_archivo, $visibility);
      }
      else
      {
        // Save the file in the filesystem
        $ruta = Storage::putFile($ruta_propuesta, $request->file('foto'), $visibility);
        // $ruta = $request->file('foto')->store($ruta_propuesta);
      }

      return $ruta;
    }

    /**
     * Show the application landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $clases = \App\Clase::orderBy('nombre')->get();

        return view('welcome', [ 'clases' => $clases ]);
    }
}
