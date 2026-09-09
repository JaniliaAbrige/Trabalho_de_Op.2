<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estudante extends Model
{
    use HasFactory;

    protected $table = 'estudantes';

    protected $fillable = [
        'usuario_id',
        'numero_estudante',
        'data_nascimento',
        'sexo',
        'documento_identificacao',
        'nacionalidade',
        'provincia',
        'distrito',
        'endereco',
        'nivel_academico',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
    ];

    /**
     * Usuário associado ao estudante.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    /**
     * Inscrições realizadas pelo estudante.
     */
    public function inscricoes()
    {
        return $this->hasMany(Inscricao::class);
    }

    /**
     * Cursos nos quais o estudante está inscrito.
     */
    public function cursos()
    {
        return $this->belongsToMany(
            Curso::class,
            'inscricoes',
            'estudante_id',
            'curso_id'
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