<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrequenceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('frequences')->insert([
            ['id' => 1, 'type' => 'Hebdomadaire'],
            ['id' => 2, 'type' => 'Mensuelle'],
        ]);
    }
}
