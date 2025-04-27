<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EfpSeeder extends Seeder
{
    public function run(): void
{
    DB::table('efps')->insert([
        ['nom_etablissement' => 'EFP1', 'adresse' => 'Adresse 1', 'numero' => '123456', 'email' => 'efp1@example.com', 'id_complexe' => 1],
        ['nom_etablissement' => 'EFP2', 'adresse' => 'Adresse 2', 'numero' => '654321', 'email' => 'efp2@example.com', 'id_complexe' => 2],
    ]);
}
}