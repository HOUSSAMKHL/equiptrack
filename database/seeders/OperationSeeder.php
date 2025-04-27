<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperationSeeder extends Seeder
{
    public function run(): void
{
    DB::table('operations')->insert([
        ['nom_operation' => 'Maintenance Préventive'],
        ['nom_operation' => 'Réparation'],
    ]);
}
}