<?php 



use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectionRegionaleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('direction_regionales')->insert([
            ['id_DR' => 1, 'Nom_DR' => 'DR Casablanca'],
            ['id_DR' => 2, 'Nom_DR' => 'DR Rabat'],
        ]);
    }
}
