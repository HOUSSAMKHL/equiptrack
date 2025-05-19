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
        ['type_frequence' => 'Trimestrielle'],
        ['type_frequence' => 'Semestrielle'],
        ['type_frequence' => 'Annuelle'],
        ['type_frequence' => 'Bimensuelle'],
        ['type_frequence' => 'Bimestrielle'],
        ['type_frequence' => 'Quadrimestrielle'],
        ['type_frequence' => 'Quinquennale'],
        ['type_frequence' => 'Décennale'],
    ]);
}
}