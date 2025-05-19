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
                'type' => 'Annuel',
                'date_de_generation' => Carbon::now()->subDays(10),
                'statut' => 'Terminé',
                'id_user' => 1
            ],
            [
                'titre' => 'Analyse des ventes Q1',
                'type' => 'Trimestriel',
                'date_de_generation' => Carbon::now()->subDays(25),
                'statut' => 'Validé',
                'id_user' => 2
            ],
            [
                'titre' => 'Audit sécurité',
                'type' => 'Spécial',
                'date_de_generation' => Carbon::now()->subDays(5),
                'statut' => 'En cours',
                'id_user' => 1
            ],
            [
                'titre' => 'Rapport mensuel - Mars',
                'type' => 'Mensuel',
                'date_de_generation' => Carbon::now()->subDays(15),
                'statut' => 'Terminé',
                'id_user' => 3
            ],
            [
                'titre' => 'Analyse marché',
                'type' => 'Spécial',
                'date_de_generation' => Carbon::now()->subDays(3),
                'statut' => 'Brouillon',
                'id_user' => 2
            ]
        ];

        foreach ($rapports as $rapport) {
            Rapport::create($rapport);
        }

    }
}