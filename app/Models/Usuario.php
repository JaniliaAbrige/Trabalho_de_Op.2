<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'senha',
        'tipo',
        'estado',
    ];

    protected $hidden = [
        'senha',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Docente associado ao usuário.
     */
    public function docente()
    {
        return $this->hasOne(Docente::class);
    }

    /**
     * Estudante associado ao usuário.
     */
    public function estudante()
    {
        return $this->hasOne(Estudante::class);
    }

    /**
     * Notificações recebidas pelo usuário.
     */
    public function notificacoes()
    {
        return $this->hasMany(Notificacao::class);
    }

    /**
     * Inscrições analisadas pelo administrador.
     */
    public function inscricoesAnalisadas()
    {
        return $this->hasMany(Inscricao::class, 'analisado_por');
    }

    /**
     * Verifica se é administrador.
     */
    public function isAdmin()
    {
        return $this->tipo === 'admin';
    }

    /**
     * Verifica se é docente.
     */
    public function isDocente()
    {
        return $this->tipo === 'docente';
    }

    /**
     * Verifica se é estudante.
     */
    public function isEstudante()
    {
        return $this->tipo === 'estudante';
    }

    /**
     * Como a senha está armazenada na coluna "senha".
     */
    public function getAuthPassword()
    {
        return $this->senha;
    }
}