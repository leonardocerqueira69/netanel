<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyArquivosColumnInPcpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pcp', function (Blueprint $table) {
            $table->text('arquivos')->nullable()->change(); // Mudando para text para suportar strings maiores
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pcp', function (Blueprint $table) {
            $table->string('arquivos', 255)->nullable()->change(); // Revertendo para string, caso necessário
        });
    }
}
