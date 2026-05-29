<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionarios';

    protected $primaryKey = 'id_funcionario';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'cargo',
    ];
}