<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = "departamento";

    protected $casts = [
        'created_at' => 'date:d-m-Y',
    ];
}
