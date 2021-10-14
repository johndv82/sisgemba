<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = "pais";

    protected $casts = [
        'created_at' => 'date:d/m/Y',
    ];

}
