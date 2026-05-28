<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'codigo',
        'fabricante',
        'marca',
        'preco',
        'unidade_medida',
        'codigo_barras',
        'estoque_minimo'
    ];

    public function estoque()
    {
        return $this->hasOne(Estoque::class);
    }

    public function movimentacoes()
    {
        return $this->hasMany(Movimentacao::class);
    }
}