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
        Schema::create('pescador', function (Blueprint $table) {
            $table->id();          // Cria coluna 'id' auto-increment
            $table->string('name');
            $table->string('identidade')->unique();
            $table->boolean('ativo')->default(true);
            $table->foreignId('peixe_id')->constrained('peixe')->onDelete('cascade');
            $table->timestamps();  // Cria 'created_at' e 'updated_at'
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pescador');
    }
};
