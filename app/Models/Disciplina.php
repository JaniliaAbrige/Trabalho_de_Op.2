<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;

    protected $table = 'disciplinas';

    protected $fillable = [
        'curso_id',
        'codigo',
        'nome',
        'descricao',
        'carga_horaria',
        'semestre',
        'estado',
    ];

    protected $casts = [
        'estado' => 'integer',
        'carga_horaria' => 'integer',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
}