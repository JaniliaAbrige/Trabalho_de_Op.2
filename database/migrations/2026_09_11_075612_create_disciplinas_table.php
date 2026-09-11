<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->id();

            // Curso ao qual a disciplina pertence
            $table->foreignId('curso_id')
                ->constrained('cursos')
                ->cascadeOnDelete();

            $table->string('codigo', 50)->unique();

            $table->string('nome');

            $table->text('descricao')->nullable();

            $table->integer('carga_horaria')->nullable();

            $table->string('semestre', 50)->nullable();

            // 1 = Ativa | 0 = Inativa
            $table->tinyInteger('estado')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('disciplinas');
    }
};