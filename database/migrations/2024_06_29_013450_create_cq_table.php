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
        Schema::create('cq', function (Blueprint $table) {
            $table->id('id_cq');
            $table->foreignId('checklist')->constrained('checklist', 'id_checklist');
            $table->integer('conf_um');
            $table->integer('conf_dois');
            $table->date('data_fm');
            $table->foreignId('colaborador')->constrained('colaborador', 'id_colaborador');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cq');
    }
};
