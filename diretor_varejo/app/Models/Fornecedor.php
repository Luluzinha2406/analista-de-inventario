<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';

    protected $primaryKey = 'id_fornecedor';

    protected $fillable = [
        'nome',
        'codigo_fornecedor',
        'telefone',
        'email',
    ];

    public function produtos()
    {
        return $this->hasMany(
            Produto::class,
            'fornecedor_id',
            'id_fornecedor'
        );
    }
}