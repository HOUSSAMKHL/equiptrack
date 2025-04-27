<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
{
    DB::table('roles')->insert([
        ['nom_role' => 'Directeur Régional'],
        ['nom_role' => 'Directeur Complexe'],
        ['nom_role' => 'Directeur Établissement'],
        ['nom_role' => 'Formateur'],
    ]);
}
}