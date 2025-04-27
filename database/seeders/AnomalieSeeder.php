<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnomalieSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('anomalies')->insert([
            ['cause_anomalie' => 'Surcharge', 'action_corrective' => 'Réduire la charge', 'date_signalement' => now(), 'duree_panne' => 5, 'cout_reparation' => 200.00, 'anomalie_resolue' => false, 'id_user' => 1],
        ]);
    }
}