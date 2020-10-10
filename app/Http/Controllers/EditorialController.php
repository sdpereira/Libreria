<?php

namespace App\Http\Controllers;

use App\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{

    public function index(Request $request)
    {
        $buscar    = $request->nombre;
        $criterio  = $request->criterio;
        $editorial = Editorial::orderBy('nombre', 'asc')->get();
        if ($buscar == '') {
            $editorial = Editorial::orderBy('nombre', 'asc')->paginate(20);
        } else {
            $editorial = Editorial::where('criterio', '=', $buscar) - orderBy('nombre', 'asc')->paginate(4);
        }
        return [
            'pagination' => [
                'total'        => $editorial->total(),
                'current_page' => $editorial->currentPage(),
                'per_page'     => $editorial->perPage(),
                'last_page'    => $editorial->lastPage(),
                'from'         => $editorial->firstItem(),
                'to'           => $editorial->lastItem(),

            ],
            'editorial'  => $editorial,
        ];
    }

    public function store(Request $request)
    {
        $editorial         = new Editorial();
        $editorial->nombre = $request->nombre;
        $editorial->save();
    }

    public function update(Request $request)
    {
        $editorial         = Editorial::findOrFail($request->id);
        $editorial->nombre = $request->nombre;
        $editorial->save();
    }

    public function destroy(Request $request)
    {
        $editorial = Editorial::findOrFail($request->id);
        $editorial->delete();
    }
}
