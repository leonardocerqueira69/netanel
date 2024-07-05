<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoCheckListSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipo_checklist')->insert([
            ['nome_tipo' => 'checklist geral'],
            ['nome_tipo' => 'checklist plana'],
            ['nome_tipo' => 'checklist klabin'],
            ['nome_tipo' => 'checklist penha'],
        ]);
    }
}