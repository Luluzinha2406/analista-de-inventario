<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';

    protected $fillable = [
        'nome',
        'codigo_fornecedor',
        'telefone',
        'email',
    ];

    public function pecas(): HasMany
    {
        return $this->hasMany(Peca::class);
    }
}