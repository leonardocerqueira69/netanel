<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoCheckListSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipo_checklist')->insert([
            ['nome_tipo' => 'geral'],
            ['nome_tipo' => 'plana'],
            ['nome_tipo' => 'klabin'],
            ['nome_tipo' => 'penha'],
        ]);
    }
}