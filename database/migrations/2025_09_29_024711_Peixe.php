<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Peixe', function (Blueprint $table) {
            $table->id();          // Cria coluna 'id' auto-increment
            $table->string('especie');
            $table->string('lugar');
            $table->float('tamanho');
            $table->integer('peso');
            $table->timestamps();  // Cria 'created_at' e 'updated_at'
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Peixe');
    }
};
