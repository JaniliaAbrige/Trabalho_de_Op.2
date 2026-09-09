<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('inscricao_id')
                ->constrained('inscricoes')
                ->cascadeOnDelete();

            $table->decimal('valor', 12, 2);

            $table->string('metodo_pagamento', 50)->nullable();

            $table->string('referencia', 100)
                ->nullable()
                ->unique();

            $table->dateTime('data_pagamento')->nullable();

            $table->enum('estado', [
                'pendente',
                'pago',
                'cancelado',
                'reembolsado'
            ])->default('pendente');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};