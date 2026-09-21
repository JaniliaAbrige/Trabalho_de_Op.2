<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->string('capa')->nullable()->after('descricao');
            $table->boolean('gratis')->default(false)->after('preco');
            $table->json('documentos')->nullable()->after('gratis');
            $table->string('link_aula')->nullable()->after('documentos');
        });
    }

    public function down(): void
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropColumn(['capa', 'gratis', 'documentos', 'link_aula']);
        });
    }
};
