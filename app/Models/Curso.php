<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';

    protected $fillable = [
        'categoria_id',
        'codigo',
        'nome',
        'descricao',
        'duracao',
        'carga_horaria',
        'modalidade',
        'requisitos',
        'preco',
        'vagas',
        'estado',
        'data_inicio',
        'data_fim',
    ];

    protected $casts = [
        'preco' => 'decimal:2',
        'data_inicio' => 'date',
        'data_fim' => 'date',
    ];

    /**
     * Categoria do curso.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    /**
     * Turmas do curso.
     */
    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }

    /**
     * Docentes que lecionam o curso.
     */
    public function docentes()
    {
        return $this->belongsToMany(
            Docente::class,
            'curso_docente',
            'curso_id',
            'docente_id'
        )->withTimestamps();
    }

    /**
     * Inscrições no curso.
     */
    public function inscricoes()
    {
        return $this->hasMany(Inscricao::class);
    }

    /**
     * Estudantes inscritos no curso.
     */
    public function estudantes()
    {
        return $this->belongsToMany(
            Estudante::class,
            'inscricoes',
            'curso_id',
            'estudante_id'
        )->withPivot([
            'id',
            'codigo_inscricao',
            'turma_id',
            'data_inscricao',
            'estado',
            'observacao',
            'data_analise',
            'analisado_por',
        ])->withTimestamps();
    }
}