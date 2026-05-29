<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carga extends Model
{
    protected $table = 'cargas';

    protected $primaryKey = 'id_carga';

    protected $fillable = [
        'codigo_carga',
        'nome',
        'fabricante_fornecedor',
        'preco',
        'quantidade',
        'peso',
        'altura',
        'largura',
        'profundidade',
        'destino',
        'status',
        'id_fornecedor',
        'id_supervisora',
    ];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'id_fornecedor', 'id_fornecedor');
    }

    public function supervisora()
    {
        return $this->belongsTo(Supervisora::class, 'id_supervisora', 'id_supervisora');
    }
}