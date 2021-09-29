<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table = "estado_civil";

    protected $casts = [
        'created_at' => 'date:d-m-Y',
    ];
}
