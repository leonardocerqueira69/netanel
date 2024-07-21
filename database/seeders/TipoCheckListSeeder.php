<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoCheckListSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipo_checklist')->insert([
            ['nome_tipo' => 'GERAL'],
            ['nome_tipo' => 'KLABIN'],
            ['nome_tipo' => 'PENHA'],
            ['nome_tipo' => 'FACA PLANA'],
        ]);
    }
}
