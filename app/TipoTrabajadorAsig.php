<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTrabajadorAsig extends Model
{
    protected $table = "tipo_trabajador_asig";

    protected $casts = [
        'created_at' => 'date:d/m/Y',
    ];
}
