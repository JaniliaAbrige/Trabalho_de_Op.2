<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estudantes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('usuario_id')
                ->unique()
                ->constrained('usuarios')
                ->cascadeOnDelete();

            $table->string('numero_estudante', 50)->unique();
            $table->date('data_nascimento')->nullable();

            $table->enum('sexo', [
                'masculino',
                'feminino',
                'outro'
            ])->nullable();

            $table->string('documento_identificacao', 100)
                ->unique();

            $table->string('nacionalidade', 100)->nullable();
            $table->string('provincia', 100)->nullable();
            $table->string('distrito', 100)->nullable();
            $table->string('endereco')->nullable();

            $table->string('nivel_academico', 150)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estudantes');
    }
};