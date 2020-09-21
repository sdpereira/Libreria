<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
class CategoriaController extends Controller
{
    public function index()
    {
        $categoria=Categoria::all();
        return $categoria;
    }

    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->save();
    }

    public function update(Request $request)
    {
        $categoria = Categoria::findOrfall($request->id);
        $categoria->nombre = $request->nombre;
        $categoria->save();
    }
    
    public function destroy(Request $request)
    {
        $categoria = Categoria::findOrfall($request->id);
        $categoria->delete();
    }
}
