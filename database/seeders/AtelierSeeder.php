<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AtelierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ateliers')->insert([
            ['id' => 1, 'numero_atelier' => 'Atelier 1', 'id_etablissement' => 1],
            ['id' => 2, 'numero_atelier' => 'Atelier 2', 'id_etablissement' => 2],
        ]);
    }
}