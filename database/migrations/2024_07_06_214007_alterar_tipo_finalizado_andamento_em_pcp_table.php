<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pcp', function (Blueprint $table) {
            $table->boolean('finalizado')->default(false)->change();
            $table->boolean('andamento')->default(false)->change();
        });
    }

    public function down()
    {
        Schema::table('pcp', function (Blueprint $table) {
            $table->tinyInteger('finalizado')->default(0)->change();
            $table->tinyInteger('andamento')->default(0)->change();
        });
    }
};
