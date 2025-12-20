<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoUsoSuelo extends Model
{
    protected $table = 'tipousosuelo';
    protected $primaryKey = 'idUso';
    public $timestamps = false;

    protected $fillable = [
        'nombre'
    ];
}
