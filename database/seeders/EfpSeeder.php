<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EfpSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('efps')->insert([
            ['id_efp' => 1, 'nom_efp' => 'EFP1', 'id_complexe' => 1],
            ['id_efp' => 2, 'nom_efp' => 'EFP2', 'id_complexe' => 2],
        ]);
    }
}
