<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrequenceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('frequences')->insert([
            ['id' => 1, 'type_frequence' => 'Hebdomadaire'],
            ['id' => 2, 'type_frequence' => 'Mensuelle'],
        ]);
    }
}