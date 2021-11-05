<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignacionTrabajador extends Model
{
    protected $table = "asignacion_trabajador";

    protected $casts = [
        'fechaingreso' => 'date:d/m/Y',
    ];

    public function cargolaboral()
    {
        return $this->belongsTo(CargoLaboral::class,'cargolaboral_id','id');
    }

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class,'trabajador_id','id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'cliente_id','id');
    }
}
