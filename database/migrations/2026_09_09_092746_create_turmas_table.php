<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('curso_id')
                ->constrained('cursos')
                ->cascadeOnDelete();

            $table->string('codigo', 50)->unique();
            $table->string('nome');

            $table->unsignedInteger('numero_vagas')->default(0);

            $table->string('sala')->nullable();

            $table->date('data_inicio')->nullable();
            $table->date('data_fim')->nullable();

            $table->enum('estado', [
                'aberta',
                'fechada',
                'cancelada'
            ])->default('aberta');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('turmas');
    }
};