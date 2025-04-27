<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['id' => 1, 'nom_categorie' => 'Pompe'],
            ['id' => 2, 'nom_categorie' => 'Compresseur'],
        ]);
    }
}