<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estoques', function (Blueprint $table) {
            $table->id('id_estoque');

            // Chave estrangeira
            $table->unsignedBigInteger('produto_id')->unique();

            $table->integer('quantidade');
            $table->date('data_entrada');

            $table->foreign('produto_id')
                ->references('id_produto')
                ->on('produtos')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estoques');
    }
};