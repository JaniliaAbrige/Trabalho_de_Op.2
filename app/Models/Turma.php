<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Turma extends Model
{
    use HasFactory;

    protected $table = 'turmas';

    protected $fillable = [
        'curso_id',
        'codigo',
        'nome',
        'numero_vagas',
        'sala',
        'data_inicio',
        'data_fim',
        'estado',
    ];

    protected $casts = [
        'data_inicio' => 'date',
        'data_fim' => 'date',
    ];

    /**
     * Curso da turma.
     */
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    /**
     * Docentes da turma.
     */
    public function docentes()
    {
        return $this->belongsToMany(
            Docente::class,
            'turma_docente',
            'turma_id',
            'docente_id'
        )->withTimestamps();
    }

    /**
     * Horários da turma.
     */
    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    /**
     * Inscrições da turma.
     */
    public function inscricoes()
    {
        return $this->hasMany(Inscricao::class);
    }

    /**
     * Estudantes da turma.
     */
    public function estudantes()
    {
        return $this->belongsToMany(
            Estudante::class,
            'inscricoes',
            'turma_id',
            'estudante_id'
        )->withPivot([
            'id',
            'codigo_inscricao',
            'curso_id',
            'data_inscricao',
            'estado',
            'observacao',
            'data_analise',
            'analisado_por',
        ])->withTimestamps();
    }
}