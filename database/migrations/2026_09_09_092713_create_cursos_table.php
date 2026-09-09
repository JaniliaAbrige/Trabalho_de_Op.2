<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('categoria_id')
                ->constrained('categorias')
                ->restrictOnDelete();

            $table->string('codigo', 50)->unique();
            $table->string('nome');
            $table->text('descricao')->nullable();

            $table->string('duracao', 100)->nullable();
            $table->unsignedInteger('carga_horaria')->nullable();

            $table->enum('modalidade', [
                'presencial',
                'online',
                'hibrido'
            ])->default('presencial');

            $table->text('requisitos')->nullable();

            $table->decimal('preco', 12, 2)->default(0);

            $table->unsignedInteger('vagas')->default(0);

            $table->enum('estado', [
                'aberto',
                'fechado',
                'suspenso'
            ])->default('aberto');

            $table->date('data_inicio')->nullable();
            $table->date('data_fim')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};