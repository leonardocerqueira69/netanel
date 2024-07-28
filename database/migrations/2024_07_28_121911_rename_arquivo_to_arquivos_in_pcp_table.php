<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameArquivoToArquivosInPcpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pcp', function (Blueprint $table) {
            $table->renameColumn('arquivo', 'arquivos');
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
            $table->renameColumn('arquivos', 'arquivo');
        });
    }
}
