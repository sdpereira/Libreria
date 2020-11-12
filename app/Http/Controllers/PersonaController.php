<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
class PersonaController extends Controller
{
    public function index(Request $request)
    {
        $buscar   = $request->nombres;
        $criterio = $request->criterio;
        $persona     = Persona::orderBy('nombres', 'asc')->get();
        if ($buscar == '') {
            $persona = Persona::orderBy('nombres', 'asc')->paginate(5);
        } else {
            $persona = Persona::where('criterio', '=', $buscar) - orderBy('nombres', 'asc')->paginate(5);
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
        $persona = Persona::select('id','nombres','apellidos','nomCom')
            ->orderBy('nombres', 'asc')->get();
        return [
            'persona' => $persona,
        ];
    }

    public function store(Request $request)
    {
        $persona         = new Persona();
        $persona->documento = $request->documento;
        $persona->numero = $request->numero;
        $persona->nombres = $request->nombres;
          $persona->apellidos = $request->apellidos;
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
        $persona->nombres = $request->nombres;
          $persona->apellidos = $request->apellidos;
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


