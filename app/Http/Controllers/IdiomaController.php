<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idioma;

class IdiomaController extends Controller
{
    public function index()
    {
        $idioma=Idioma::all();
        return $idioma;
    }

    public function store(Request $request)
    {
        $idioma = new Idioma();
        $idioma->nombre = $request->nombre;
        $idioma->save();
    }

    public function update(Request $request)
    {
        $idioma = Idioma::findOrfall($request->id);
        $idioma->nombre = $request->nombre;
        $idioma->save();
    }
    
    public function destroy(Request $request)
    {
        $idioma = Idioma::findOrfall($request->id);
        $idioma->delete();
    }
}
