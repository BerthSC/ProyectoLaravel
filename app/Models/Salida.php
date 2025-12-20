<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $table = 'salida';
    protected $primaryKey = 'id_salida';
    public $timestamps = false;

    protected $fillable = [
        'id_equipo',
        'cantidad',
        'fecha_salida',
        'tipo_salida',
        'responsable',
        'observaciones'
    ];

    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'id_equipo', 'id_equipo');
    }
}
