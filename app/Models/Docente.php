<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = 'docentes';

    protected $fillable = [
        'usuario_id',
        'numero_docente',
        'grau_academico',
        'especialidade',
        'departamento',
        'biografia',
    ];

    /**
     * Usuário associado ao docente.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    /**
     * Cursos lecionados pelo docente.
     */
    public function cursos()
    {
        return $this->belongsToMany(
            Curso::class,
            'curso_docente',
            'docente_id',
            'curso_id'
        )->withTimestamps();
    }

    /**
     * Turmas ministradas pelo docente.
     */
    public function turmas()
    {
        return $this->belongsToMany(
            Turma::class,
            'turma_docente',
            'docente_id',
            'turma_id'
        )->withTimestamps();
    }
}