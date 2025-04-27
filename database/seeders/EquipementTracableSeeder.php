<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipementTracableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('equipement_tracables')->insert([
            ['id' => 1, 'code' => 'TRC-001', 'id_atelier' => 1, 'id_identifie' => 1],
        ]);
    }
}

