<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectionRegionaleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('direction_regionales')->insert([
            ['Nom_DR' => 'DR Casablanca'],
            ['Nom_DR' => 'DR Rabat'],
        ]);
    }
}