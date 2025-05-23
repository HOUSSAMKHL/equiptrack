<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rapport;
use Carbon\Carbon;

class RapportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rapports = [
            [
                'titre' => 'Rapport annuel 2023',
                'date_de_generation' => Carbon::now()->subDays(10),
                'statut' => 'Terminé',
                'id_user' => 1,
                'fichier_path' => 'rapports/fichier_annuel_2023.pdf'
            ],
            [
                'titre' => 'Analyse des ventes Q1',
                'date_de_generation' => Carbon::now()->subDays(25),
                'statut' => 'Validé',
                'id_user' => 2,
                'fichier_path' => 'rapports/ventes_q1.pdf'
            ],
            [
                'titre' => 'Audit sécurité',
                'date_de_generation' => Carbon::now()->subDays(5),
                'statut' => 'En cours',
                'id_user' => 1,
                'fichier_path' => 'rapports/audit_securite.pdf'
            ],
            [
                'titre' => 'Rapport mensuel - Mars',
                'date_de_generation' => Carbon::now()->subDays(15),
                'statut' => 'Terminé',
                'id_user' => 3,
                'fichier_path' => 'rapports/mensuel_mars.pdf'
            ],
            [
                'titre' => 'Analyse marché',
                'date_de_generation' => Carbon::now()->subDays(3),
                'statut' => 'Brouillon',
                'id_user' => 2,
                'fichier_path' => 'rapports/analyse_marche.pdf'
            ]
        ];

        foreach ($rapports as $rapport) {
            Rapport::create($rapport);
        }
    }
}
