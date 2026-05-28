<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movimentacaos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('produto_id')
                ->constrained('produtos')
                ->onDelete('cascade');

            $table->enum('tipo_movimentacao', [
                'ENTRADA',
                'SAIDA'
            ]);

            $table->integer('quantidade');

            $table->date('data_movimentacao');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movimentacaos');
    }
};