<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegimenSalud extends Model
{
    protected $table = "regimen_salud";

    protected $casts = [
        'created_at' => 'date:d/m/Y',
    ];
}
