<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ejidatario extends Model
{
    protected $table = 'ejidatarios';
    protected $primaryKey = 'idEjidatario';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'fechaNacimiento',
        'curp',
        'rfc',
        'claveElector',
        'direccion',
        'telefono',
        'email',
        'fechaIngreso',
        'numeroEjidatario',
        'idEstatus'
    ];
}
