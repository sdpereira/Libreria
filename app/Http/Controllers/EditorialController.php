<?php

namespace App\Http\Controllers;

use App\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{

    public function index(Request $request)
    {
        $buscar    = $request->buscar;
        $criterio  = $request->criterio;
        $editorials = Editorial::orderBy('nombre', 'asc')->get();
        if ($buscar == '') {
            $editorials = Editorial::orderBy('nombre', 'asc')->paginate(20);
        } else {
            $editorials = Editorial::where('criterio', '=', $buscar) - orderBy('nombre', 'asc')->paginate(4);
        }
        return [
            'pagination' => [
                'total'        => $editorials->total(),
                'current_page' => $editorials->currentPage(),
                'per_page'     => $editorials->perPage(),
                'last_page'    => $editorials->lastPage(),
                'from'         => $editorials->firstItem(),
                'to'           => $editorials->lastItem(),

            ],
            'editorials'  => $editorials,
        ];
    }
    public function getEditorial(Request $request)
    {
        $editorials = Editorial::select('id', 'nombre')
            ->orderBy('nombre', 'asc')->get();
        return [
            'editorials' => $editorials,
        ];
    }

    public function store(Request $request)
    {
        $editorials         = new Editorial();
        $editorials->nombre = $request->nombre;
        $editorials->save();
    }

    public function update(Request $request)
    {
        $editorials         = Editorial::findOrFail($request->id);
        $editorials->nombre = $request->nombre;
        $editorials->save();
    }

    public function destroy(Request $request)
    {
        $editorials = Editorial::findOrFail($request->id);
        $editorials->delete();
    }
}
