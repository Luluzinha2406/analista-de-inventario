<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('supervisoras', function (Blueprint $table) {
            $table->id('id_supervisora');
            $table->string('nome');
            $table->string('cidade')->default('Jundiaí, SP');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('supervisoras');
    }
};