<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estoque extends Model
{
    protected $table = 'estoques';

    protected $fillable = [
        'peca_id',
        'quantidade',
        'corredor',
        'prateleira',
        'data_entrada',
    ];

    protected $casts = [
        'data_entrada' => 'date',
    ];

    public function peca(): BelongsTo
    {
        return $this->belongsTo(Peca::class);
    }
}