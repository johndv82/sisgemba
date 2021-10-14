<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CargoLaboral extends Model
{
    protected $table = "cargo_laboral";

    protected $casts = [
        'created_at' => 'date:d/m/Y',
    ];
}
