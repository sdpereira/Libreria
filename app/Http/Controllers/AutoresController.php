<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autores;

class AutoresController extends Controller
{
    public function index(Request $request)
    {
    $buscar   = $request->nombre;
    $criterio = $request->criterio;
    $autores = Autores::orderBy('nombre', 'asc')->get();

    if ($buscar == '') {
        $autores = Autores::join('pais', 'autores.id_pais', '=', 'pais.id')
            ->select('autores.id', 'autores.nombre', 'pais.nombre as nomPais')
            ->orderBy('nombre', 'asc')->paginate(4);
        } else { $autores = Autores::join('pais', 'autores.id_pais', '=', 'pais.id')
            ->select('autores.id', 'autores.nombre', 'pais.nombre as nomPais') ->orderBy('nombre', 'asc')->paginate(4);
        }
            return [
                'pagination' => [
                    'total'        => $autores->total(),
                    'current_page' => $autores->currentPage(),
                    'per_page'     => $autores->perPage(),
                    'last_page'    => $autores->lastPage(),
                    'from'         => $autores->firstItem(),
                    'to'           => $autores->lastItem(),
    
                ],
                'autores'  => $autores,
            ];
    
}
    public function getAutores(Request $request)
    {
        $autores=Autores::select('id','nombre')
        ->orderBy('nombre','asc')
        ->get();
        return[
          'autores'=>$autores  
        ];
    }

    public function store(Request $request)
    {
        $autores              = new Autores();
        $autores->nombre      = $request->nombre;
        $autores->id_pais = $request->id_pais;
        $autores->save();
    }

    public function update(Request $request)
    {
        $autores              = Autores::findOrfail($request->id);
        $autores->nombre      = $request->nombre;
        $autores->id_pais = $request->id_pais;
        $autores->save();
    }

    public function destroy(Request $request)
    {
        $autores = Autores::findOrfail($request->id);
        $autores->delete();
    }
}
