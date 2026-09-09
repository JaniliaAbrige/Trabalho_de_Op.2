<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inscricoes', function (Blueprint $table) {
            $table->id();

            $table->string('codigo_inscricao', 50)->unique();

            $table->foreignId('estudante_id')
                ->constrained('estudantes')
                ->cascadeOnDelete();

            $table->foreignId('curso_id')
                ->constrained('cursos')
                ->restrictOnDelete();

            $table->foreignId('turma_id')
                ->nullable()
                ->constrained('turmas')
                ->nullOnDelete();

            $table->dateTime('data_inscricao');

            $table->enum('estado', [
                'rascunho',
                'submetida',
                'em_analise',
                'aprovada',
                'rejeitada',
                'cancelada',
                'matriculada'
            ])->default('rascunho');

            $table->text('observacao')->nullable();

            $table->dateTime('data_analise')->nullable();

            $table->foreignId('analisado_por')
                ->nullable()
                ->constrained('usuarios')
                ->nullOnDelete();

            $table->timestamps();

            $table->unique([
                'estudante_id',
                'curso_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscricoes');
    }
};