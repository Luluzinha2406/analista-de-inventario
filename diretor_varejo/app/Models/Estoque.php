<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $table = 'estoques';

    protected $primaryKey = 'id_estoque';

    protected $fillable = [
        'produto_id',
        'quantidade',
        'data_entrada',
    ];

    public function produto()
    {
        return $this->belongsTo(
            Produto::class,
            'produto_id',
            'id_produto'
        );
    }
}