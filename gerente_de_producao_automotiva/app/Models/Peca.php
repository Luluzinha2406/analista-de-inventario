<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Peca extends Model
{
    protected $table = 'pecas';

    protected $fillable = [
        'nome',
        'codigo',
        'fabricante',
        'preco',
        'numero_serie',
        'compatibilidade_robo',
        'vida_util_horas',
        'fornecedor_id',
    ];

    protected $casts = [
        'preco' => 'decimal:2',
    ];

    public function fornecedor(): BelongsTo
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function estoque(): HasOne
    {
        return $this->hasOne(Estoque::class);
    }
}