<?php

namespace App\Http\Controllers;

use App\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index(Request $request)
    {
        $buscar   = $request->buscar;
        // $criterio = $request->criterio;
        $libros = Libro::orderBy('nombre', 'asc')->get();
        


        if ($buscar == '') {
            $libros = Libro::join('categorias','libros.id_categoria','=','categorias.id')
        ->join('idiomas', 'libros.id_idioma', '=', 'idiomas.id')
        ->join('autores', 'libros.id_autores', '=', 'autores.id')
        ->join('editorials', 'libros.id_editorial', '=', 'editorials.id')
            ->select('libros.id',
            'libros.nombre',
            'libros.codigo',
            'libros.cant',
            'libros.ano_publi',
            'libros.num_pag',
            'libros.ubicacion',
            'libros.edicion',
                'categorias.nombre as nomCat',
                'idiomas.nombre as nomIdi',
                'autores.nombre as nomAut',
                'editorials.nombre as nomEdi'
            ) 
            ->orderBy('nombre','asc')->paginate(2);
        } else {
            $libros = Libro::join('categorias','libros.id_categoria','=','categorias.id')
        ->join('idiomas', 'libros.id_idioma', '=', 'idiomas.id')
        ->join('autores', 'libros.id_autores', '=', 'autores.id')
        ->join('editorials', 'libros.id_editorial', '=', 'editorials.id')
            ->select('libros.id',
            'libros.nombre',
            'libros.codigo',
            'libros.cant',
            'libros.ano_publi',
            'libros.num_pag',
            'libros.ubicacion',
            'libros.edicion',
                'categorias.nombre as nomCat',
                'idiomas.nombre as nomIdi',
                'autores.nombre as nomAut',
                'editorials.nombre as nomEdi',
         ) //->where('libros.nombre','like', '%'.$buscar.'%')
            // ->orwhere('libros.codigo','like', '%'.$buscar.'%')

             ->orderBy('nombre','asc')->paginate(2);
        }

        return [
            'pagination' => [
                'total'        => $libros->total(),
                'current_page' => $libros->currentPage(),
                'per_page'     => $libros->perPage(),
                'last_page'    => $libros->lastPage(),
                'from'         => $libros->firstItem(),
                'to'           => $libros->lastItem(),

            ],
            'libros'  => $libros,
        ];
    }

    public function GetLibro(Request $request)
    {
        $buscar   = $request->buscar;
        // $criterio = $request->criterio;
        $libros = Libro::orderBy('nombre', 'asc')->get();

        $libros = Libro::join('autores', 'libros.id_autores', '=', 'autores.id')
        ->join('editorials', 'libros.id_editorial', '=', 'editorials.id')
        ->select( 'libros.id','libros.codigo','libros.nombre','libros.cant','autores.nombre as nomAut',
        'editorials.nombre as nomEdi',)
        ->where('libros.codigo',$buscar)
            ->orwhere('libros.nombre','like', '%'.$buscar.'%')
            ->orderBy('nombre','asc')->take(1)->get(); // take solo toma el primer valor buscado
        return [
            'libros'  => $libros
        ];
    }

    public function store(Request $request)
    {
        $libros = new Libro();
        $libros->nombre = $request->nombre;
        $libros->codigo = $request->codigo;
        $libros->cant = $request->cant;
        $libros->ano_publi = $request->ano_publi;
        $libros->num_pag = $request->num_pag;
        $libros->ubicacion = $request->ubicacion;
        $libros->edicion = $request->edicion;
        $libros->id_categoria = $request->id_categoria;
        $libros->id_idioma = $request->id_idioma;
        $libros->id_autores = $request->id_autores;
        $libros->id_editorial = $request->id_editorial;

        $libros->save();
    }
    
    public function update(Request $request)
    {
        $libros = Libro::findOrFail($request->id);
        $libros->nombre = $request->nombre;
        $libros->codigo = $request->codigo;
        $libros->cant = $request->cant;
        $libros->ano_publi = $request->ano_publi;
        $libros->num_pag = $request->num_pag;
        $libros->ubicacion = $request->ubicacion;
        $libros->edicion = $request->edicion;
        $libros->id_categoria = $request->id_categoria;
        $libros->id_idioma = $request->id_idioma;
        $libros->id_autores = $request->id_autores;
        $libros->id_editorial = $request->id_editorial;
        $libros->save();
    }

    public function destroy(Request $request)
    {
        $libros = Libro::findOrFail($request->id);
        $libros->delete();
    }
}
