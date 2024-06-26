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
        Schema::create('jogos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 120)->unique()->nullable(false);
            $table->decimal('preco')->nullable(false);
            $table->string('descricao', 800)->nullable(false);
            $table->string('classificacao', 20)->nullable(false);
            $table->string('plataformas', 60)->nullable(false);
            $table->string('desenvolvedor', 120)->nullable(false);
            $table->string('distribuidora', 120)->nullable(false);
            $table->string('categoria', 55)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogos');
    }
};
