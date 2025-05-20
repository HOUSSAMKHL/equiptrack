<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('operations')->insert([
            [
                'nom_operation' => 'Maintenance préventive trimestrielle',
                'type' => 'Trimestrielle',
                'equipement' => 'Pompe Hydraulique PH-2000',
                'date' => '2024-01-15',
                'duree' => '6h',
                'intervenant' => 'Jean Dupont',
                'statut' => 'Planned',
            ],
            [
                'nom_operation' => 'Remplacement connecteur thermique',
                'type' => 'Ponctuelle',
                'equipement' => 'Four Industriel FI-5300',
                'date' => '2024-03-10',
                'duree' => '8h',
                'intervenant' => 'Sophie Leblanc',
                'statut' => 'Resolved',
            ],
            [
                'nom_operation' => 'Inspection visuelle annuelle',
                'type' => 'Annuelle',
                'equipement' => 'Compresseur C-800',
                'date' => '2024-05-01',
                'duree' => '4h',
                'intervenant' => 'Paul Martin',
                'statut' => 'Planned',
            ],            

        ]);
    }
}
