<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudLibro extends Model
{
    protected $table = 'solicitud_libros'; 
    protected $fillable=['id','fec_sol','fec_entrega','id_persona'];
    public $timestamps=false;
}
