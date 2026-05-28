<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $table = 'estoques';

    protected $fillable = [
        'produto_id',
        'quantidade'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}