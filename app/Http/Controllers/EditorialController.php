<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Editorial;
class EditorialController extends Controller
{
   
    public function index()
    {
        $editorial=Editorial::all();
        return $editorial;
    }

    public function store(Request $request)
    {
        $editorial = new Editorial();
        $editorial->nombre = $request->nombre;
        $editorial->save();
    }

    public function update(Request $request)
    {
        $editorial = Editorial::findOrfall($request->id);
        $editorial->nombre = $request->nombre;
        $editorial->save();
    }
    
    public function destroy(Request $request)
    {
        $editorial = Editorial::findOrfall($request->id);
        $editorial->delete();
    }
}
