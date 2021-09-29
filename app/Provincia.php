<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = "provincia";

    protected $casts = [
        'created_at' => 'date:d-m-Y',
    ];
}
