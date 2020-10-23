<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
class PersonaController extends Controller
{
    public function index(Request $request)
    {
        $buscar   = $request->nombrecompleto;
        $criterio = $request->criterio;
        $persona     = Persona::orderBy('nombrecompleto', 'asc')->get();
        if ($buscar == '') {
            $persona = Persona::orderBy('nombrecompleto', 'asc')->paginate(5);
        } else {
            $persona = Persona::where('criterio', '=', $buscar) - orderBy('nombrecompleto', 'asc')->paginate(5);
        }
        return [
            'pagination' => [
                'total'        => $persona->total(),
                'current_page' => $persona->currentPage(),
                'per_page'     => $persona->perPage(),
                'last_page'    => $persona->lastPage(),
                'from'         => $persona->firstItem(),
                'to'           => $persona->lastItem(),

            ],
            'persona'       => $persona,
        ];
    }
    public function getPersona(Request $request)
    {
        $persona = Persona::select('id', 'nombrecompleto')
            ->orderBy('nombrecompleto', 'asc')->get();
        return [
            'persona' => $persona
        ];
    }

    public function store(Request $request)
    {
        $persona         = new Persona();
        $persona->documento = $request->documento;
        $persona->numero = $request->numero;
        $persona->nombrecompleto = $request->nombrecompleto;
        $persona->direccion = $request->direccion;
        $persona->telefono = $request->telefono;
        $persona->email = $request->email;
        $persona->save();
    }

    public function update(Request $request)
    {
        $persona         = Persona::findOrFail($request->id);
        $persona->documento = $request->documento;
        $persona->numero = $request->numero;
        $persona->nombrecompleto = $request->nombrecompleto;
        $persona->direccion = $request->direccion;
        $persona->telefono = $request->telefono;
        $persona->email = $request->email;
        $persona->save();
    
    }

    public function destroy(Request $request)
    {
        $persona = Persona::findOrFail($request->id);
        $persona->delete();
    }
}


