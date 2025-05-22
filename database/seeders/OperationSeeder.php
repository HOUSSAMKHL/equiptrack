<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperationSeeder extends Seeder
{
     public function run(): void
    {
        DB::table('operations')->insert([
            ['nom_operation' => 'Maintenance préventive trimestrielle'],
            ['nom_operation' => 'Remplacement connecteur thermique'],
            ['nom_operation' => 'Inspection visuelle annuelle'],
        ]);
    }
}
