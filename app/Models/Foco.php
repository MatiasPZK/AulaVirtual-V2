<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foco extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_serie',
        'tipo',
        'aula_id',
        'luminosidad',
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
