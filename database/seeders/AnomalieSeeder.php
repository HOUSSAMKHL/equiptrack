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
            ['cause_anomalie' => 'Usure', 'action_corrective' => 'Remplacer la pièce', 'priorite'=>'high', 'status'=>'Resolved' ,'id_intervenant'=>2, 'date_signalement' => now(), 'duree_panne' => 3, 'cout_reparation' => 150.00, 'anomalie_resolue' => true, 'id_user' => 2,'id_equipement' => 2],
            ['cause_anomalie' => 'Fuite d\'huile', 'action_corrective' => 'Réparer le joint', 'priorite'=>'medium', 'status'=>'In progress' ,'id_intervenant'=>3, 'date_signalement' => now(), 'duree_panne' => 4, 'cout_reparation' => 100.00, 'anomalie_resolue' => false, 'id_user' => 3,'id_equipement' => 3],
            ['cause_anomalie' => 'Bruit anormal', 'action_corrective' => 'Lubrifier les roulements', 'priorite'=>'low', 'status'=>'Resolved' ,'id_intervenant'=>1, 'date_signalement' => now(), 'duree_panne' => 2, 'cout_reparation' => 50.00, 'anomalie_resolue' => true, 'id_user' => 1,'id_equipement' => 4],
            ['cause_anomalie' => 'Vibration excessive', 'action_corrective' => 'Équilibrer le rotor', 'priorite'=>'high', 'status'=>'In progress' ,'id_intervenant'=>2, 'date_signalement' => now(), 'duree_panne' => 6, 'cout_reparation' => 300.00, 'anomalie_resolue' => false, 'id_user' => 2,'id_equipement' => 1],
            ['cause_anomalie' => 'Surchauffe', 'action_corrective' => 'Vérifier le système de refroidissement', 'priorite'=>'medium', 'status'=>'Resolved' ,'id_intervenant'=>3, 'date_signalement' => now(), 'duree_panne' => 1, 'cout_reparation' => 80.00, 'anomalie_resolue' => true, 'id_user' => 3,'id_equipement' => 2],

        ]);
    }
}
