<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "cliente";

    protected $fillable = [
        'razonsocial', 'nombrecomercial', 'ruc', 'contacto', 'domicilio','created_at'
    ];
}
