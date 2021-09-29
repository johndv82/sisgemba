<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegimenPension extends Model
{
    protected $table = "regimen_pension";

    protected $casts = [
        'created_at' => 'date:d-m-Y',
    ];
}
