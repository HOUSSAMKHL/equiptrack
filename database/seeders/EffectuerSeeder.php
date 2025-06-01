<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EffectuerSeeder extends Seeder
{
    public function run(): void
{
    DB::table('effectuer')->insert([
        ['id_user' => 1, 'id_exemplaire' => 1, 'id_operation' => 1,'id_frequence' => 1 ,'date_operation' => '2023-04-27', 'durée' => '02', 'statut' => 'completed'],
        ['id_user' => 2, 'id_exemplaire' => 2, 'id_operation' => 2, 'id_frequence' => 2,'date_operation' => '2023-04-28', 'durée' => '03', 'statut' => 'in progress'],
        ['id_user' => 3, 'id_exemplaire' => 3, 'id_operation' => 3,'id_frequence' => 1, 'date_operation' => '2023-04-29', 'durée' => '01', 'statut' => 'planned'],
    ]);
}
}