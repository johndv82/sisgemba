<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table = "trabajador";

    public function tiposdocumentos()
    {
        return $this->belongsTo(TipoDocumento::class,'tipodocumento_id','id');
    }
}
