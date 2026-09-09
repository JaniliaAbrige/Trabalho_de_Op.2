<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    use HasFactory;

    protected $table = 'inscricoes';

    protected $fillable = [
        'codigo_inscricao',
        'estudante_id',
        'curso_id',
        'turma_id',
        'data_inscricao',
        'estado',
        'observacao',
        'data_analise',
        'analisado_por',
    ];

    protected $casts = [
        'data_inscricao' => 'date',
        'data_analise' => 'datetime',
    ];

    /**
     * Estudante que realizou a inscrição
     */
    public function estudante()
    {
        return $this->belongsTo(Estudante::class, 'estudante_id');
    }

    /**
     * Curso escolhido
     */
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    /**
     * Turma escolhida
     */
    public function turma()
    {
        return $this->belongsTo(Turma::class, 'turma_id');
    }

    /**
     * Administrador que analisou a inscrição
     */
    public function analisadoPor()
    {
        return $this->belongsTo(
            Usuario::class,
            'analisado_por'
        );
    }

    /**
     * Pagamentos relacionados à inscrição
     */
    public function pagamentos()
    {
        return $this->hasMany(
            Pagamento::class,
            'inscricao_id'
        );
    }
}