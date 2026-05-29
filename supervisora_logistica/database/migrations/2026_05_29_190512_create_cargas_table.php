<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cargas', function (Blueprint $table) {
            $table->id('id_carga');

            $table->string('codigo_carga')->unique();
            $table->string('nome');
            $table->string('fabricante_fornecedor');
            $table->decimal('preco', 10, 2);
            $table->integer('quantidade');

            $table->decimal('peso', 10, 2);
            $table->decimal('altura', 10, 2);
            $table->decimal('largura', 10, 2);
            $table->decimal('profundidade', 10, 2);

            $table->string('destino');

            $table->enum('status', [
                'Recebido',
                'Em Processamento',
                'Expedido'
            ])->default('Recebido');

            $table->unsignedBigInteger('id_fornecedor');
            $table->unsignedBigInteger('id_supervisora');

            $table->foreign('id_fornecedor')
                ->references('id_fornecedor')
                ->on('fornecedores')
                ->onDelete('cascade');

            $table->foreign('id_supervisora')
                ->references('id_supervisora')
                ->on('supervisoras')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cargas');
    }
};