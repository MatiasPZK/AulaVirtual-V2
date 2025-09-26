<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'profesor_id',
        'aula_id',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'materia'
    ];

    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
