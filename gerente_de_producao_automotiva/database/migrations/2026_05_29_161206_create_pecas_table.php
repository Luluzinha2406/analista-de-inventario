<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pecas', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->string('codigo')->unique();
            $table->string('fabricante');

            $table->decimal('preco', 10, 2);

            $table->string('numero_serie')->unique();
            $table->string('compatibilidade_robo');

            $table->integer('vida_util_horas');

            $table->foreignId('fornecedor_id')
                  ->constrained('fornecedores')
                  ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pecas');
    }
};