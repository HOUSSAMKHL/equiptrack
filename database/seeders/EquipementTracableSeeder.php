<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipementTracableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('equipement_tracables')->insert([
            ['id' => 1, 'statut' => 'Actif', 'reference' => 'TRC-001', 'annee_dacquisition' => 2021, 'valeur_dacquisition' => 1500.00, 'id_atelier' => 1, 'id_equipement' => 1],
        ]);
    }
}