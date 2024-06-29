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
            $table->foreignId('conf_um')->constrained('colaborador', 'id_colaborador');
            $table->foreignId('conf_dois')->constrained('colaborador', 'id_colaborador');
            $table->date('data_fm');
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
