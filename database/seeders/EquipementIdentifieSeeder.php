<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipementIdentifieSeeder extends Seeder
{
    public function run(): void
{
    DB::table('equipement_identifies')->insert([
        ['nom_equipement' => 'Compresseur X100', 'secteur' => 'Mécanique', 'id_categorie' => 1,'id_etablissement' => 1 , 'quantite' => 2],
        ['nom_equipement' => 'Générateur Y200', 'secteur' => 'Électrique', 'id_categorie' => 1,'id_etablissement' => 1, 'quantite' => 1],
        ['nom_equipement' => 'Presse Z300', 'secteur' => 'Hydraulique', 'id_categorie' => 2,'id_etablissement' => 2, 'quantite' => 3],
        ['nom_equipement' => 'Scie A400', 'secteur' => 'Découpe', 'id_categorie' => 3,'id_etablissement' => 2, 'quantite' => 4],
        ['nom_equipement' => 'Tour B500', 'secteur' => 'Usinage', 'id_categorie' => 4,'id_etablissement' => 3, 'quantite' => 5],
    ]);
}
}