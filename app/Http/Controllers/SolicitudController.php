<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SolicitudLibro;
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
}
