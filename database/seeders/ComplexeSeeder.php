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
                'nom_complexe' => 'Complexe Hassan II - Casablanca',
                'ville' => 'Casablanca',
                'adresse' => 'Boulevard Moulay Youssef',
                'description' => 'Principal complexe de formation à Casablanca',
                'id_DR' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nom_complexe' => 'Complexe Mohammed VI - Rabat',
                'ville' => 'Rabat',
                'adresse' => 'Avenue Mohammed VI',
                'description' => 'Principal complexe de formation à Rabat',
                'id_DR' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nom_complexe' => 'Complexe Al Qods - Marrakech',
                'ville' => 'Marrakech',
                'adresse' => 'Route de Safi',
                'description' => 'Principal complexe de formation à Marrakech',
                'id_DR' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}