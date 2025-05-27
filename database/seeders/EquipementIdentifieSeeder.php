<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipementIdentifieSeeder extends Seeder
{
    public function run(): void
{
    DB::table('equipement_identifies')->insert([
        ['nom_equipement' => 'Compresseur X100', 'secteur' => 'Mécanique', 'id_categorie' => 1,'id_etablissement' => 1],
        ['nom_equipement' => 'Presse Y200', 'secteur' => 'Hydraulique', 'id_categorie' => 2,'id_etablissement' => 2],
        ['nom_equipement' => 'Scie Z300', 'secteur' => 'Découpe', 'id_categorie' => 3,'id_etablissement' => 3],
        ['nom_equipement' => 'Tour A400', 'secteur' => 'Usinage', 'id_categorie' => 4,'id_etablissement' => 3],
    ]);
}
}