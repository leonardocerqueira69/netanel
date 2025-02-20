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
            $table->dateTime('meta_conclusao')->nullable();
        });
    }

    public function down()
    {
        Schema::table('pcp', function (Blueprint $table) {
            $table->dropColumn('meta_conclusao');
        });
    }

};
