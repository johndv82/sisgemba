<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table = "trabajador";

    public function tipodocumento()
    {
        return $this->belongsTo(TipoDocumento::class,'tipodocumento_id','id');
    }

    public function hijos(){
        return $this->hasMany(HijosTrabajador::class,'trabajador_id','id');
    }
}
