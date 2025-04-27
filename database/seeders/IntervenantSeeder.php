<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IntervenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('intervenants')->insert([
            ['nom_intervenant' => 'Intervenant 1', 'numero' => '0612345678', 'societe' => 'Societe A'],
            ['nom_intervenant' => 'Intervenant 2', 'numero' => '0612345679', 'societe' => 'Societe B'],
            ['nom_intervenant' => 'Intervenant 3', 'numero' => '0612345680', 'societe' => 'Societe C'],
            ['nom_intervenant' => 'Intervenant 4', 'numero' => '0612345681', 'societe' => 'Societe D'],
        ]);
    }
}