<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $table = 'entrada';
    protected $primaryKey = 'id_entrada';

    protected $fillable = [
        'id_equipo',
        'cantidad',
        'observaciones',
        'fecha_entrada'
    ];

    public $timestamps = false;

    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'id_equipo');
    }
}
