<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['id' => 1, 'nom_role' => 'Directeur Régional'],
            ['id' => 2, 'nom_role' => 'Directeur Complexe'],
            ['id' => 3, 'nom_role' => 'Directeur Établissement'],
            ['id' => 4, 'nom_role' => 'Formateur'],
        ]);
    }
}
