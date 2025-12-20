<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colindancia extends Model
{
    protected $table = 'colindancia';
    protected $primaryKey = 'idColindancia';
    public $timestamps = false;

    protected $fillable = [
        'norte',
        'sur',
        'este',
        'oeste',
        'noreste',
        'noroeste',
        'sureste',
        'suroeste',
        'idParcela'
    ];

    public function parcela()
    {
        return $this->belongsTo(Parcela::class, 'idParcela', 'idParcela');
    }
}
