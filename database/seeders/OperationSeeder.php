<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperationSeeder extends Seeder
{
    public function run(): void
{
    DB::table('operations')->insert([
        ['nom_operation' => 'Maintenance Préventive'],
        ['nom_operation' => 'Réparation'],
        ['nom_operation' => 'Remplacement'],
        ['nom_operation' => 'Inspection'],
        ['nom_operation' => 'Nettoyage'],
        ['nom_operation' => 'Calibration'],
        ['nom_operation' => 'Mise à jour logicielle'],
        ['nom_operation' => 'Test de performance'],
        ['nom_operation' => 'Vérification de sécurité'],
        ['nom_operation' => 'Contrôle qualité'],
        ['nom_operation' => 'Démontage'],
        ['nom_operation' => 'Assemblage'],
    ]);
}
}