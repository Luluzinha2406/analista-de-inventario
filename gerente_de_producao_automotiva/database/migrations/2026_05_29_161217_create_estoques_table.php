<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estoques', function (Blueprint $table) {
            $table->id();

            $table->foreignId('peca_id')
                  ->constrained('pecas')
                  ->cascadeOnDelete();

            $table->integer('quantidade');

            $table->string('corredor');
            $table->string('prateleira');

            $table->date('data_entrada');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estoques');
    }
};