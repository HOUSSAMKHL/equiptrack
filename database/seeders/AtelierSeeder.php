<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AtelierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ateliers')->insert([
            ['numero_atelier' => 'Atelier Informatique', 'id_etablissement' => 1],
            ['numero_atelier' => 'Atelier Réseaux', 'id_etablissement' => 1],
            ['numero_atelier' => 'Atelier Développement', 'id_etablissement' => 1],
            ['numero_atelier' => 'Atelier Maintenance', 'id_etablissement' => 2],
            ['numero_atelier' => 'Atelier Électronique', 'id_etablissement' => 2],
            ['numero_atelier' => 'Atelier Télécoms', 'id_etablissement' => 3],
            ['numero_atelier' => 'Atelier Génie Civil', 'id_etablissement' => 4],
            ['numero_atelier' => 'Atelier Mécanique', 'id_etablissement' => 4],
        ]);
    }
}