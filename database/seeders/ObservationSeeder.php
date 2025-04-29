<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObservationSeeder extends Seeder
{
    public function run(): void
{
    DB::table('observations')->insert([
        [
           
            'description_panne' => 'Description for observation 1',
           
        ],
        [
            
            'description_panne' => 'Description for observation 2',
           
        ],
        // Add more observations as needed
    ]);
}
}