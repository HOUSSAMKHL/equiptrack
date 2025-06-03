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
                'reference' => 'OFPPT-PC-2023-001', 
                'annee_dacquisition' => 2023, 
                'valeur_dacquisition' => 7500.00, 
                'id_atelier' => 1, 
                'id_equipement' => 1,
                'id_frequence' => 1
            ],
            [
                'statut' => 'En maintenance', 
                'reference' => 'OFPPT-SRV-2022-005', 
                'annee_dacquisition' => 2022, 
                'valeur_dacquisition' => 25000.00, 
                'id_atelier' => 2, 
                'id_equipement' => 2,
                'id_frequence' => 2
            ],
            [
                'statut' => 'Hors service', 
                'reference' => 'OFPPT-SW-2020-012', 
                'annee_dacquisition' => 2020, 
                'valeur_dacquisition' => 15000.00, 
                'id_atelier' => 2, 
                'id_equipement' => 3,
                'id_frequence' => 3
            ]
        ]);
    }
}