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
        Schema::create('checklist', function (Blueprint $table) {
            $table->id('id_checklist');
            $table->text('texto');
            $table->foreignId('tipo')->constrained('tipo_checklist', 'id_tipo');
            $table->tinyInteger('finalizado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklist');
    }
};
