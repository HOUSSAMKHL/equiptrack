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
            ['Nom_DR' => 'DR Marrakech'],
            ['Nom_DR' => 'DR Fès'],
            ['Nom_DR' => 'DR Tanger'],
            ['Nom_DR' => 'DR Agadir'],
            ['Nom_DR' => 'DR Oujda'],
            ['Nom_DR' => 'DR Laâyoune'],
            ['Nom_DR' => 'DR Dakhla'],
            ['Nom_DR' => 'DR Tétouan'],
            ['Nom_DR' => 'DR Beni Mellal'],
            ['Nom_DR' => 'DR Kénitra'],
        ]);
    }
}