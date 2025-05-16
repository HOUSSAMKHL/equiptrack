<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class ComplexeSeeder extends Seeder
{
    public function run(): void
{
    DB::table('complexes')->insert([
        [
                'nom_complexe' => 'Complexe A',
                'ville' => 'Casablanca',
                'adresse' => 'Zone industrielle A',
                'description' => 'Complexe moderne A',
                'id_DR' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nom_complexe' => 'Complexe B',
                'ville' => 'Rabat',
                'adresse' => 'Zone industrielle B',
                'description' => 'Complexe moderne B',
                'id_DR' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
    ]);
}
}