<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supervisora extends Model
{
    protected $table = 'supervisoras';

    protected $primaryKey = 'id_supervisora';

    protected $fillable = [
        'nome',
        'cidade',
    ];

    public function cargas()
    {
        return $this->hasMany(Carga::class, 'id_supervisora', 'id_supervisora');
    }
}