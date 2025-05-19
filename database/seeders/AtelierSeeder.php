<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AtelierSeeder extends Seeder
{
    public function run(): void
{
    DB::table('ateliers')->insert([
        ['numero_atelier' => 'Atelier 1', 'id_etablissement' => 1],
        ['numero_atelier' => 'Atelier 2', 'id_etablissement' => 2],
        ['numero_atelier' => 'Atelier 3', 'id_etablissement' => 1],
        ['numero_atelier' => 'Atelier 4', 'id_etablissement' => 3],
        ['numero_atelier' => 'Atelier 5', 'id_etablissement' => 2],
        ['numero_atelier' => 'Atelier 6', 'id_etablissement' => 1],
        ['numero_atelier' => 'Atelier 7', 'id_etablissement' => 3],
        ['numero_atelier' => 'Atelier 8', 'id_etablissement' => 2],
        ['numero_atelier' => 'Atelier 9', 'id_etablissement' => 1],
        ['numero_atelier' => 'Atelier 10', 'id_etablissement' => 3],
    ]);
}
}