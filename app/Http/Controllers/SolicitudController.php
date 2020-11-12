<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SolicitudLibro;
use App\DetalleSolicitudes;

class SolicitudController extends Controller
{
    //
    public function index(Request $request)
    {
        $buscar   = $request->buscar;
        // $criterio = $request->criterio;

        if ($buscar == '') {
            $solicitud = SolicitudLibro::orderBy('id', 'asc')->paginate(1);
        } else {
            $solicitud = SolicitudLibro::where('criterio', '=', $buscar) -> orderBy('id', 'asc')->paginate(1);
        }

        return [
            'pagination' => [
                'total'        => $solicitud->total(),
                'current_page' => $solicitud->currentPage(),
                'per_page'     => $solicitud->perPage(),
                'last_page'    => $solicitud->lastPage(),
                'from'         => $solicitud->firstItem(),
                'to'           => $solicitud->lastItem(),

            ],
            'solicitud'  => $solicitud,
        ];
}

public function store(Request $request)
{
    try {
        DB::beginTransaction();
        
        $solicitud= new SolicitudLibro();
        $solicitud->fec_entrega = $request->fec_entrega;
        $solicitud->id_persona = $request->id_persona;
        $solicitud->save();

        $detalles=$request->data;

        foreach ($detalles as $key => $det){
            
            $detalle = new DetalleSolicitudes();
            $detalle->id_solicitud = $solicitud->id;
            $detalle->id_libro = $det['id'];
            $detalle->cant = $det['cant'];
            $detalle->save();
            
        }
        DB::commit();
    } catch (Exception $e) {
        DB::rollBack();
        console.log('Error', $e);
    }
}
}

// public function destroy(Request $request)
//     {
//         $solicitud = SolicitudLibro::findOrFail($request->id);
//         $solicitud->delete();
//     }
// }
