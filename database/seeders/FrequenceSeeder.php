<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrequenceSeeder extends Seeder
{
    public function run(): void
{
    DB::table('frequences')->insert([
        ['type_frequence' => 'Hebdomadaire'],
        ['type_frequence' => 'Mensuelle'],
    ]);
}
}