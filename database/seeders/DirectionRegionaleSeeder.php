<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectionRegionaleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('direction_regionales')->insert([
            ['Nom_DR' => 'DR Grand Casablanca-Settat'],
            ['Nom_DR' => 'DR Rabat-Salé-Kénitra'],
            ['Nom_DR' => 'DR Marrakech-Safi'],
            ['Nom_DR' => 'DR Fès-Meknès'],
            ['Nom_DR' => 'DR Tanger-Tétouan-Al Hoceima'],
            ['Nom_DR' => 'DR Souss-Massa'],
            ['Nom_DR' => 'DR Oriental'],
            ['Nom_DR' => 'DR Laâyoune-Sakia El Hamra'],
            ['Nom_DR' => 'DR Dakhla-Oued Ed Dahab'],
            ['Nom_DR' => 'DR Béni Mellal-Khénifra'],
            ['Nom_DR' => 'DR Drâa-Tafilalet'],
            ['Nom_DR' => 'DR Guelmim-Oued Noun'],
        ]);
    }
}