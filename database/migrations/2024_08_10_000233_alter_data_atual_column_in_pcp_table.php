<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pcp', function (Blueprint $table) {
            $table->dateTime('data_atual')->change();
        });
    }

    public function down(): void
    {
        Schema::table('pcp', function (Blueprint $table) {
            $table->date('data_atual')->change();
        });
    }
};
