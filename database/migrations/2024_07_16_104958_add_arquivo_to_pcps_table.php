<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('pcp', function (Blueprint $table) {
        $table->string('arquivo')->nullable();
    });
}

public function down()
{
    Schema::table('pcp', function (Blueprint $table) {
        $table->dropColumn('arquivo');
    });
}
};
