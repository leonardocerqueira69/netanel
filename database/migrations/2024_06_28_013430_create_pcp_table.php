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
        Schema::create('pcp', function (Blueprint $table) {
            $table->id('id_pcp');
            $table->foreignId('setor')->constrained('setor', 'id_setor');
            $table->text('texto');
            $table->date('data_atual');
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
        Schema::dropIfExists('pcp');
    }
};
