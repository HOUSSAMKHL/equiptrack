<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComplexeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('complexes')->insert([
            ['id' => 1, 'nom_complexe' => 'Complexe A', 'id_DR' => 1],
            ['id' => 2, 'nom_complexe' => 'Complexe B', 'id_DR' => 2],
        ]);
    }
}