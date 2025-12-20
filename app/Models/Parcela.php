<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    protected $table = 'parcelas';
    protected $primaryKey = 'idParcela';
    public $timestamps = false;

    protected $fillable = [
        'noParcela',
        'superficie',
        'idUso',
        'ubicacion',
        'idEjidatario'
    ];

public function ejidatario() { return $this->belongsTo(Ejidatario::class, 'idEjidatario'); }
public function colindancia() { return $this->hasOne(Colindancia::class, 'idParcela'); }
public function coordenadas() { return $this->hasMany(Coordenada::class, 'idParcela'); }
public function infAdmin() { return $this->hasOne(InfAdmin::class, 'idParcela'); }

}
