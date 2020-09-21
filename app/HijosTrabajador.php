<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HijosTrabajador extends Model
{
    protected $table = "hijos_trabajador";

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class,'trabajador_id','id');
    }

    public function tipodocumento()
    {
        return $this->belongsTo(TipoDocumento::class,'tipodocumento_id','id');
    }
}
