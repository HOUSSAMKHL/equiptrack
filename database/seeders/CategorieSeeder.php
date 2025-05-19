<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    public function run(): void
{
    DB::table('categories')->insert([
        ['nom_categorie' => 'Pompe'],
        ['nom_categorie' => 'Compresseur'],
        ['nom_categorie' => 'Moteur'],
        ['nom_categorie' => 'Vanne'],
        ['nom_categorie' => 'Capteur'],
        ['nom_categorie' => 'Actionneur'],
        ['nom_categorie' => 'Transformateur'],
        ['nom_categorie' => 'Redresseur'],
        ['nom_categorie' => 'Onduleur'],
        ['nom_categorie' => 'Variateur de vitesse'],
        ['nom_categorie' => 'Alimentation électrique'],
        ['nom_categorie' => 'Disjoncteur'],
        ['nom_categorie' => 'Relais'],
        ['nom_categorie' => 'Contacteur'],
        ['nom_categorie' => 'Transformateur de courant'],
    ]);
}
}