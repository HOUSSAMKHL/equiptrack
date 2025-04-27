<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EffectuerSeeder extends Seeder
{
    public function run(): void
{
    DB::table('effectuer')->insert([
        ['id_user' => 1, 'id_exemplaire' => 1, 'id_operation' => 1, 'date_operation' => '2023-04-27', 'durée' => '02:00:00'],
    ]);
}
}