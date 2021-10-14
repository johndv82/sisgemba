<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NivelEstudios extends Model
{
    protected $table = "nivel_estudios";

    protected $casts = [
        'created_at' => 'date:d/m/Y',
    ];
}
