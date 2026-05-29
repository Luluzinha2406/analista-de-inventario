<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id('id_produto');

            $table->string('nome');
            $table->string('codigo')->unique();
            $table->string('fabricante');
            $table->decimal('preco', 10, 2);
            $table->string('categoria');
            $table->date('data_validade')->nullable();
            $table->string('temperatura_armazenamento')->nullable();

            // Chave estrangeira
            $table->unsignedBigInteger('fornecedor_id');

            $table->foreign('fornecedor_id')
                ->references('id_fornecedor')
                ->on('fornecedores')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};