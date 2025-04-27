<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipementIdentifieSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('equipement_identifies')->insert([
            ['id' => 1, 'libelle' => 'Compresseur X100', 'id_categorie' => 2, 'id_frequence' => 1],
        ]);
    }
}
