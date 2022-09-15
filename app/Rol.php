<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = "rol";

    protected $fillable = [
        'nombre', 'observaciones', 'estado',
    ];

    protected $casts = [
        'created_at' => 'date:d/m/Y',
    ];
}
