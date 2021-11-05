<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacacion extends Model
{
    protected $table = "vacacion";

    protected $casts = [
        'fecha_inicio' => 'date:d/m/Y',
    ];
}
