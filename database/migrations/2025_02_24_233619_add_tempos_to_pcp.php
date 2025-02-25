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
        Schema::table('pcp', function (Blueprint $table) {
            if (!Schema::hasColumn('pcp', 'tempo1')) {
                $table->string('tempo1')->nullable();
            }
            if (!Schema::hasColumn('pcp', 'tempo2')) {
                $table->string('tempo2')->nullable();
            }
            if (!Schema::hasColumn('pcp', 'tempo3')) {
                $table->string('tempo3')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pcp', function (Blueprint $table) {
            $table->dropColumn(['tempo1', 'tempo2', 'tempo3']);
        });
    }
};
