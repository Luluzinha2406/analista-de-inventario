<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $primaryKey = 'id_produto';

    protected $fillable = [
        'nome',
        'codigo',
        'fabricante',
        'preco',
        'categoria',
        'data_validade',
        'temperatura_armazenamento',
        'fornecedor_id',
    ];

    public function fornecedor()
    {
        return $this->belongsTo(
            Fornecedor::class,
            'fornecedor_id',
            'id_fornecedor'
        );
    }

    public function estoque()
    {
        return $this->hasOne(
            Estoque::class,
            'produto_id',
            'id_produto'
        );
    }
}