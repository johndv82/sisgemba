<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table = "distrito";

    protected $casts = [
        'created_at' => 'date:d-m-Y',
    ];
}
