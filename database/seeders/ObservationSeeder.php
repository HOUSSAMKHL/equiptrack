<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObservationSeeder extends Seeder
{
    public function run(): void
{
    DB::table('intervenants')->insert([
        ['nom_intervenant' => 'Intervenant 1', 'numero' => '0612345678', 'societe' => 'Societe A'],
    ]);
}
}