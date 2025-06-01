<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AtelierUtilisateurSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('atelier_utilisateur')->insert([
            ['utilisateur_id' => 4, 'atelier_id' => 1], // omar is assigned to Atelier 1
            ['utilisateur_id' => 4, 'atelier_id' => 2], // omar is also assigned to Atelier 2
        ]);
    }
}