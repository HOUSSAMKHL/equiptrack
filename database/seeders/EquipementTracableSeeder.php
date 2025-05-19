<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipementTracableSeeder extends Seeder
{
    public function run(): void
{
    DB::table('equipement_tracables')->insert([
        ['statut' => 'Actif', 'reference' => 'TRC-001', 'annee_dacquisition' => 2021, 'valeur_dacquisition' => 1500.00, 'id_atelier' => 1, 'id_equipement' => 1],
        ['statut' => 'Inactif', 'reference' => 'TRC-002', 'annee_dacquisition' => 2020, 'valeur_dacquisition' => 2000.00, 'id_atelier' => 2, 'id_equipement' => 2],
        ['statut' => 'Actif', 'reference' => 'TRC-003', 'annee_dacquisition' => 2022, 'valeur_dacquisition' => 2500.00, 'id_atelier' => 1, 'id_equipement' => 3],
        ['statut' => 'Inactif', 'reference' => 'TRC-004', 'annee_dacquisition' => 2019, 'valeur_dacquisition' => 3000.00, 'id_atelier' => 3, 'id_equipement' => 4],
    ]);
}
}