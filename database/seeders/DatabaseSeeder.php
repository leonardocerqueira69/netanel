<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(TipoCheckListSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SetorTableSeeder::class);
    }
}
