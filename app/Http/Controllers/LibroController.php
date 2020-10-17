<?php

namespace App\Http\Controllers;

use App\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        // $buscar   = $request->nombre;
        // $criterio = $request->criterio;

        // if ($buscar == '') {
        //     $libro = Categoria::orderBy('nombre', 'asc')->paginate(10);
        // } else {
        //     $libro = Categoria::where('criterio', '=', $buscar) - orderBy('nombre', 'asc')->paginate(10);
        // }

        // return [
        //     'pagination' => [
        //         'total'        => $libro->total(),
        //         'current_page' => $libro->currentPage(),
        //         'per_page'     => $libro->perPage(),
        //         'last_page'    => $libro->lastPage(),
        //         'from'         => $libro->firstItem(),
        //         'to'           => $libro->lastItem(),

        //     ],
        //     'libro'  => $libro,
        // ];

        $libro = Libro::join(
            'categoria',
            'libro.id_categoria',
            '=',
            'categoria.id'
        )
            ->join('editorials', 'libro.id_editorial', '=', 'editorials.id')
            ->join('categoria', 'libro.id_categoria', '=', 'categoria.id')
            ->join('idioma', 'libro.id_idioma', '=', 'idioma.id')
            ->join('autores', 'libro.id_autores', '=', 'autores.id')
            ->select(
                'libro.nombre as nomLib',
                'categoria.nombre as nomCat',
                'editorials.nombre as nomEdi',
                'idioma.nombre as nomIdi',
                'autores.nombre as nomAut'
            )
            ->orderBy('nombre','asc')->get();
        return [
            'libro' => $libro,
        ];
    }

    public function store(Request $request)
    {
        $libro = new Libro();
        $libro->nombre = $request->nombre;
        $libro->codigo = $request->codigo;
        $libro->cant = $request->cant;
        $libro->cant = $request->cant;
        $libro->ano_publi = $request->ano_publi;
        $libro->num_pag = $request->num_pag;
        $libro->ubicacion = $request->ubicacion;
        $libro->edicion = $request->edicion;
        $libro->id_categoria = $request->id_categoria;
        $libro->id_idioma = $request->id_idioma;
        $libro->id_autores = $request->id_autores;
        $libro->id_editorial = $request->id_editorial;

        $libro->save();
    }

    public function update(Request $request, $id)
    {
        $libro = Libro::fillOrFail($request->$id);
        $libro->nombre = $request->nombre;
        $libro->codigo = $request->codigo;
        $libro->cant = $request->cant;
        $libro->cant = $request->cant;
        $libro->ano_publi = $request->ano_publi;
        $libro->num_pag = $request->num_pag;
        $libro->ubicacion = $request->ubicacion;
        $libro->edicion = $request->edicion;
        $libro->id_categoria = $request->id_categoria;
        $libro->id_idioma = $request->id_idioma;
        $libro->id_autores = $request->id_autores;
        $libro->id_editorial = $request->id_editorial;
        $libro->save();
    }

    public function destroy($id)
    {
        $libro = Libro::fillOrFail($request->$id);
        $libro->delete();
    }
}
