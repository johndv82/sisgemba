<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignacionTrabajador extends Model
{
    protected $table = "asignacion_trabajador";

    public function cargolaboral()
    {
        return $this->belongsTo(CargoLaboral::class,'cargolaboral_id','id');
    }

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class,'trabajador_id','id');
    }
}
