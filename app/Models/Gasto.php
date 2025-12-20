<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    protected $table = 'gastos';
    protected $primaryKey = 'idGasto';
    public $timestamps = false;

    protected $fillable = [
        'responsable',
        'fecha',
        'monto',
        'concepto',
        'medida'
    ];
}
