<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VinculoLaboral extends Model
{
    protected $table = "vinculo_laboral";

    protected $casts = [
        'created_at' => 'date:d/m/Y',
    ];
}
