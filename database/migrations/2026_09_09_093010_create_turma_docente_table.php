<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('turma_docente', function (Blueprint $table) {
            $table->id();

            $table->foreignId('turma_id')
                ->constrained('turmas')
                ->cascadeOnDelete();

            $table->foreignId('docente_id')
                ->constrained('docentes')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique([
                'turma_id',
                'docente_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('turma_docente');
    }
};