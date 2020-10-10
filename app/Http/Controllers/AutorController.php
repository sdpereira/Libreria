<?php

namespace App\Http\Controllers;

use App\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        $autor = Autor::orderBy('nombre', 'asc')->get();
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
