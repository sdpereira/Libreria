<?php

namespace App\Http\Controllers;

use App\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        $autor = Autor::join('pais','autor.id_pais','=','pais.id')
        ->select('autor.id','autor.nombre','pais.nombre as nomPais')
        ->orderBy('nombre', 'asc')->get();
        return [
            'autor' => $autor,
        ];
    }
    
    public function getAutor(Request $request)
    {
        $autor = Autor::select('id','nombre')
        ->orderBy('nombre', 'asc')->get();
        return [
            'autor' => $autor,
        ];
    }
    
    
    public function store(Request $request)
    {
        $autor         = new Autor();
        $autor->nombre = $request->nombre;
        $autor->save();
    }

    public function update(Request $request)
    {
        $autor         = Autor::findOrFail($request->id);
        $autor->nombre = $request->nombre;
        $autor->save();
    }

    public function destroy(Request $request)
    {
        $autor = Autor::findOrFail($request->id);
        $autor->delete();
    }
}
