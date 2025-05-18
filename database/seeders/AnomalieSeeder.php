<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnomalieSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('anomalies')->insert([
            ['cause_anomalie' => 'Surcharge', 'action_corrective' => 'Réduire la charge', 'priorite'=>'low', 'status'=>'In progress' ,'id_intervenant'=>1, 'date_signalement' => now(), 'duree_panne' => 5, 'cout_reparation' => 200.00, 'anomalie_resolue' => false, 'id_user' => 1,'id_equipement' => 1],
            ['cause_anomalie' => 'Surcharge', 'action_corrective' => 'Réduire la charge', 'priorite'=>'low', 'status'=>'In progress' ,'id_intervenant'=>1, 'date_signalement' => now(), 'duree_panne' => 5, 'cout_reparation' => 200.00, 'anomalie_resolue' => false, 'id_user' => 1,'id_equipement' => 1],
            ['cause_anomalie' => 'Surcharge', 'action_corrective' => 'Réduire la charge', 'priorite'=>'low', 'status'=>'In progress' ,'id_intervenant'=>1, 'date_signalement' => now(), 'duree_panne' => 5, 'cout_reparation' => 200.00, 'anomalie_resolue' => false, 'id_user' => 1,'id_equipement' => 1],
            ['cause_anomalie' => 'Surcharge', 'action_corrective' => 'Réduire la charge', 'priorite'=>'low', 'status'=>'In progress' ,'id_intervenant'=>1, 'date_signalement' => now(), 'duree_panne' => 5, 'cout_reparation' => 200.00, 'anomalie_resolue' => false, 'id_user' => 1,'id_equipement' => 1],
            ['cause_anomalie' => 'Surcharge', 'action_corrective' => 'Réduire la charge', 'priorite'=>'low', 'status'=>'open' ,'id_intervenant'=>1, 'date_signalement' => now(), 'duree_panne' => 5, 'cout_reparation' => 200.00, 'anomalie_resolue' => false, 'id_user' => 1,'id_equipement' => 1],
            ['cause_anomalie' => 'Surcharge', 'action_corrective' => 'Réduire la charge', 'priorite'=>'low', 'status'=>'resolved' ,'id_intervenant'=>1, 'date_signalement' => now(), 'duree_panne' => 5, 'cout_reparation' => 200.00, 'anomalie_resolue' => false, 'id_user' => 1,'id_equipement' => 1],

        ]);
    }
}