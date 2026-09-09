<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'horarios';

    protected $fillable = [
        'turma_id',
        'dia_semana',
        'hora_inicio',
        'hora_fim',
        'sala',
    ];

    /**
     * Turma associada ao horário.
     */
    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }
}