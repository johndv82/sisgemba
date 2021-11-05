<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table = "trabajador";

    protected $fillable = [];

    public function tipodocumento()
    {
        return $this->belongsTo(TipoDocumento::class,'tipodocumento_id','id');
    }

    public function hijos(){
        return $this->hasMany(HijosTrabajador::class,'trabajador_id','id');
    }

    public function asignaciones(){
        return $this->hasMany(AsignacionTrabajador::class,'trabajador_id','id');
    }

    public function estadotrabajador(){
        return $this->belongsTo(EstadoTrabajador::class, 'estadotrabajador_id', 'id');
    }
}
