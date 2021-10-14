<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = "tipo_documento";

    protected $casts = [
        'created_at' => 'date:d/m/Y',
    ];
}
