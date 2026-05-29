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
    ];

    public function cargas()
    {
        return $this->hasMany(Carga::class, 'id_fornecedor', 'id_fornecedor');
    }
}