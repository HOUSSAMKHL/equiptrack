<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['nom_categorie' => 'Ordinateurs'],
            ['nom_categorie' => 'Serveurs'],
            ['nom_categorie' => 'Switchs'],
            ['nom_categorie' => 'Routeurs'],
            ['nom_categorie' => 'Imprimantes'],
            ['nom_categorie' => 'Projecteurs'],
            ['nom_categorie' => 'Tableaux interactifs'],
            ['nom_categorie' => 'Oscilloscopes'],
            ['nom_categorie' => 'Générateurs de signaux'],
            ['nom_categorie' => 'Postes de soudure'],
            ['nom_categorie' => 'Machines CNC'],
            ['nom_categorie' => 'Outils électroportatifs'],
        ]);
    }
}