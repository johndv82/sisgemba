<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = "provincia";

    protected $casts = [
        'created_at' => 'date:d/m/Y',
    ];

    protected $fillable = ['id', 'nombre', 'created_at'];

    public function pais()
    {
        return $this->belongsTo(Pais::class,'pais_id','id');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class,'departamento_id','id');
    }
}
