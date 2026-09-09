<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacao extends Model
{
    use HasFactory;

    protected $table = 'notificacoes';

    protected $fillable = [
        'usuario_id',
        'titulo',
        'mensagem',
        'tipo',
        'lida',
        'data_envio',
    ];

    protected $casts = [
        'lida' => 'boolean',
        'data_envio' => 'datetime',
    ];

    /**
     * Usuário que recebe a notificação.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}