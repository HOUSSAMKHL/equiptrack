<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipementIdentifieSeeder extends Seeder
{
    public function run(): void
{
    DB::table('equipement_identifies')->insert([
        ['nom_equipement' => 'Compresseur X100', 'secteur' => 'Mécanique', 'id_categorie' => 1, 'id_frequence' => 1],
    ]);
}
}