<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipementTracableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('equipement_tracables')->insert([
            [
                'statut' => 'Opérationnel', 
                'reference' => 'TRC-001', 
                'annee_dacquisition' => 2021, 
                'valeur_dacquisition' => 1500.00, 
                'id_atelier' => 1, 
                'id_equipement' => 1
            ],
            [
                'statut' => 'En maintenance', 
                'reference' => 'TRC-002', 
                'annee_dacquisition' => 2020, 
                'valeur_dacquisition' => 2000.00, 
                'id_atelier' => 2, 
                'id_equipement' => 2
            ],
            [
                'statut' => 'Hors service', 
                'reference' => 'TRC-003', 
                'annee_dacquisition' => 2022, 
                'valeur_dacquisition' => 2500.00, 
                'id_atelier' => 1, 
                'id_equipement' => 3
            ]
        ]);
    }
}