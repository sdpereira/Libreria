<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    // protected $table = 'personas'; 
    protected $fillable=[
    'id','documento','numero','nombres','apellidos','direccion',
    'telefono','email','nomCom'];
    public $timestamps=false;
}
