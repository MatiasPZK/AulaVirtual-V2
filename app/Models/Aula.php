<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'capacidad',
        'profesor_id',
    ];

    public function profesor()
    {
        return $this->belongsTo(\App\Models\Profesor::class);
    }
}

