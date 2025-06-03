<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EfpSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('efps')->insert([
            [
                'nom_etablissement' => 'ISTA El Hank',
                'adresse' => 'El Hank, Casablanca',
                'numero' => '0522223344',
                'email' => 'ista_elhank@ofppt.ma',
                'id_complexe' => 1
            ],
            [
                'nom_etablissement' => 'ISTA NTIC Casablanca',
                'adresse' => 'Boulevard Moulay Youssef, Casablanca',
                'numero' => '0522294545',
                'email' => 'ista_ntic_casa@ofppt.ma',
                'id_complexe' => 1
            ],
            [
                'nom_etablissement' => 'ISTA Hay Hassani',
                'adresse' => 'Hay Hassani, Casablanca',
                'numero' => '0522364545',
                'email' => 'ista_hayhassani@ofppt.ma',
                'id_complexe' => 1
            ],
            [
                'nom_etablissement' => 'ISTA NTIC Rabat',
                'adresse' => 'Avenue Mohammed VI, Rabat',
                'numero' => '0537724545',
                'email' => 'ista_ntic_rabat@ofppt.ma',
                'id_complexe' => 2
            ],
            [
                'nom_etablissement' => 'ISTA Marrakech',
                'adresse' => 'Route de Safi, Marrakech',
                'numero' => '0524434545',
                'email' => 'ista_marrakech@ofppt.ma',
                'id_complexe' => 3
            ],
        ]);
    }
}
