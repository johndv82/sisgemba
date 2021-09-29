<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoTrabajador extends Model
{
    protected $table = "estado_trabajador";

    protected $casts = [
        'created_at' => 'date:d-m-Y',
    ];
}
