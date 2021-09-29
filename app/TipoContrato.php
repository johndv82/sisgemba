<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoContrato extends Model
{
    protected $table = "tipo_contrato";

    protected $casts = [
        'created_at' => 'date:d-m-Y',
    ];
}
