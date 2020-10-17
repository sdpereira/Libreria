<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autores;

class AutoresController extends Controller
{
    public function index()
    {
        $autores = Autores::join('pais', 'autores.id_pais', '=', 'pais.id')
            ->select('autores.id', 'autores.nombre', 'pais.nombre as nomPais')

            ->orderBy('nombre', 'asc')->get();
        return [
            'autores' => $autores,
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
