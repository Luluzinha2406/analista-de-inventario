<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->string('codigo')->unique();
            $table->string('fabricante');
            $table->string('marca');

            $table->decimal('preco');

            $table->enum('unidade_medida', [
                'Kg',
                'Litro',
                'Unidade'
            ]);

            $table->string('codigo_barras')->unique();

            $table->integer('estoque_minimo');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};