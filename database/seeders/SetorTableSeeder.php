<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SetorTableSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('setor')->insert([
            ['nome' => 'PROJETO'],
            ['nome' => 'MONTAGEM'],
            ['nome' => 'EMBORRACHAMENTO'],
            ['nome' => 'EXPEDIÇÃO'],
            ['nome' => 'OUTROS'],
        ]);
    }
}
