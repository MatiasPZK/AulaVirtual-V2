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

    public static $bloques = [
        1 => '7:00-7:40',
        2 => '7:40-8:15',
        3 => '8:15-8:25 (Recreo)',
        4 => '8:25-9:05',
        5 => '9:05-9:40',
        6 => '9:40-9:50 (Recreo)',
        7 => '9:50-10:30',
        8 => '10:30-11:05',
        9 => '11:05-11:15 (Recreo)',
        10 => '11:15-11:55',
        11 => '11:55-12:30',
    ];

}
