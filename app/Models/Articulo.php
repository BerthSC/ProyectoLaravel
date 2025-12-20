<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'articulos';
    protected $primaryKey = 'id_equipo';

    protected $fillable = [
        'descripcion',
        'cantidad',
        'estado',
        'medida',
        'fecha_registro'
    ];

    public $timestamps = false;

    public function entradas()
    {
        return $this->hasMany(Entrada::class, 'id_equipo');
    }
}
