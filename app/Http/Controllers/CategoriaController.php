<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $buscar   = $request->buscar;
        $criterio = $request->criterio;

        if ($buscar == '') {
            $categoria = Categoria::orderBy('nombre', 'asc')->paginate(3);
        } else {
            $categoria = Categoria::where('criterio', '=', $buscar) - orderBy('nombre', 'asc')->paginate(3);
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
    }
    public function getCategoria(Request $request)
    {
        $categoria=Categoria::select('id','nombre')
        ->orderBy('nombre','asc')
        ->get();
        return[
          'categoria'=>$categoria  
        ];
    }

    public function store(Request $request)
    {
        $categoria         = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->save();
    }

    public function update(Request $request)
    {
        $categoria         = Categoria::findOrFail($request->id);
        $categoria->nombre = $request->nombre;
        $categoria->save();
    }

    public function destroy(Request $request)
    {
        $categoria = Categoria::findOrFail($request->id);
        $categoria->delete();
    }
}
