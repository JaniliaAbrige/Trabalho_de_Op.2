<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pagamento extends Model
{
    use HasFactory;

    protected $table = 'pagamentos';

    protected $fillable = [
        'inscricao_id',
        'valor',
        'metodo_pagamento',
        'referencia',
        'data_pagamento',
        'estado',
    ];

    protected $casts = [
        'valor' => 'decimal:2',
        'data_pagamento' => 'datetime',
    ];

    /**
     * Inscrição relacionada ao pagamento.
     */
    public function inscricao()
    {
        return $this->belongsTo(Inscricao::class);
    }
}