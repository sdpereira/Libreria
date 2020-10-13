<?php

namespace App\Http\Controllers;

use App\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{

    public function index()
    {
        $buscar   = $request->nombre;
        $criterio = $request->criterio;

        if ($buscar == '') {
            $categoria = Categoria::orderBy('nombre', 'asc')->paginate(10);
        } else {
            $categoria = Categoria::where('criterio', '=', $buscar) - orderBy('nombre', 'asc')->paginate(10);
        }

        return [
            'pagination' => [
                'total'        => $categoria->total(),
                'current_page' => $categoria->currentPage(),
                'per_page'     => $categoria->perPage(),
                'last_page'    => $categoria->lastPage(),
                'from'         => $categoria->firstItem(),
                'to'           => $categoria->lastItem(),

            ],
            'categoria'  => $categoria,
        ];
    
        $libro = Libro::join('categoria', 'libro.id_categoria', '=', 'categoria.id')
            ->join('editorial', 'libro.id_editorial', '=', 'editorial.id')
            ->join('idioma', 'libro.id_idioma', '=', 'idioma.id')
            ->join('autor', 'libro.id_autor', '=', 'autor.id')
            ->select(
                'categoria.nombre as nomCat',
                'editorial.nombre as nomEdi',
                'idioma.nombre as nomIdi',
                'autor.nombre as nomAut')
            ->orderBy()->get();
        return [
            'libro' => $libro,
        ];
    }

    public function store(Request $request)
    {
        $libro         = new Libro();
        $libro->nombre = $request->nombre;
        $libro->save();
    }

    public function update(Request $request, $id)
    {
        $libro         = Libro::fillOrFail($request->$id);
        $libro->nombre = $request->nombre;
        $libro->save();
    }

    public function destroy($id)
    {
        $libro = Libro::fillOrFail($request->$id);
        $libro->delete();
    }
}
