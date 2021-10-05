<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table = "distrito";

    protected $casts = [
        'created_at' => 'date:d-m-Y',
    ];

    protected $fillable = ['id', 'nombre', 'created_at'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class,'departamento_id','id');
    }

    public function provincia()
    {
        return $this->belongsTo(Provincia::class,'provincia_id','id');
    }
}
