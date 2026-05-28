<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    protected $table = 'movimentacaos';

    protected $fillable = [
        'produto_id',
        'tipo_movimentacao',
        'quantidade',
        'data_movimentacao'
    ];

    protected $casts = [
        'data_movimentacao' => 'date'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}