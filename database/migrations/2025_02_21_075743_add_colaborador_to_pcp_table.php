<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pcp', function (Blueprint $table) {
            if (!Schema::hasColumn('pcp', 'colaborador')) {
                $table->text('colaborador')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('pcp', function (Blueprint $table) {
            if (Schema::hasColumn('pcp', 'colaborador')) {
                $table->dropColumn('colaborador');
            }
        });
    }
};
