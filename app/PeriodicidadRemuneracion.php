<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodicidadRemuneracion extends Model
{
    protected $table = "periodicidad_remuneracion";

    protected $casts = [
        'created_at' => 'date:d-m-Y',
    ];
}
