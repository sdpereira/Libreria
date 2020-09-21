<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;

class PaisController extends Controller
{
    public function index()
    {
        $pais=Pais::all();
        return $pais;
    }

    public function store(Request $request)
    {
        $pais = new Pais();
        $pais->nombre = $request->nombre;
        $pais->save();
    }

    public function update(Request $request)
    {
        $pais = Pais::findOrfall($request->id);
        $pais->nombre = $request->nombre;
        $pais->save();
    }
    
    public function destroy(Request $request)
    {
        $pais = Pais::findOrfall($request->id);
        $pais->delete();
    }
}

