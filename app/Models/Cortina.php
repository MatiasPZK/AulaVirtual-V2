<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cortina extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'aula_id',
        'hora_apertura',
        'hora_cierre',
        'dias',
        'estado',
        'automatica',
    ];

    protected $casts = [
        'dias' => 'array',
        'estado' => 'boolean',
        'automatica' => 'boolean',
    ];

    // Relación con aula
    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
