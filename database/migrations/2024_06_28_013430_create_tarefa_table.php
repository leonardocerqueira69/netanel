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
        Schema::create('tarefa', function (Blueprint $table) {
            $table->id('id_tarefa');
            $table->foreignId('setor')->constrained('setor', 'id_setor');
            $table->text('texto');
            $table->foreignId('pcp')->constrained('pcp', 'id_pcp');
            $table->tinyInteger('finalizado');
            $table->tinyInteger('andamento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefa');
    }
};
