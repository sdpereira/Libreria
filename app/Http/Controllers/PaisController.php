<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;

class PaisController extends Controller
{
    public function index(Request $request)
    {
        $buscar    = $request->nombre;
        $criterio  = $request->criterio;
        $pais = Pais::orderBy('nombre', 'asc')->get();
        if ($buscar == '') {
            $pais = Pais::orderBy('nombre', 'asc')->paginate(5);
        } else {
            $pais = Pais::where('criterio', '=', $buscar) - orderBy('nombre', 'asc')->paginate(5);
        }
        return [
            'pagination' => [
                'total'        => $pais->total(),
                'current_page' => $pais->currentPage(),
                'per_page'     => $pais->perPage(),
                'last_page'    => $pais->lastPage(),
                'from'         => $pais->firstItem(),
                'to'           => $pais->lastItem(),

            ],
            'pais'  => $pais,
        ];
    }

    public function store(Request $request)
    {
        $pais = new Pais();
        $pais->nombre = $request->nombre;
        $pais->save();
    }

    public function update(Request $request)
    {
        $pais = Pais::findOrFail($request->id);
        $pais->nombre = $request->nombre;
        $pais->save();
    }
    
    public function destroy(Request $request)
    {
        $pais = Pais::findOrFail($request->id);
        $pais->delete();
    }
}
