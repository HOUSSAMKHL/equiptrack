<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UtilisateurSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('utilisateurs')->insert([
            ['id' => 1, 'nom' => 'Ahmed', 'email' => 'ahmed@dr.com', 'password' => bcrypt('password'), 'role_id' => 1, 'id_DR' => 1],
            ['id' => 2, 'nom' => 'Sara', 'email' => 'sara@complexe.com', 'password' => bcrypt('password'), 'role_id' => 2, 'id_complexe' => 1],
            ['id' => 3, 'nom' => 'Yassine', 'email' => 'yassine@efp.com', 'password' => bcrypt('password'), 'role_id' => 3, 'id_efp' => 1],
            ['id' => 4, 'nom' => 'Khadija', 'email' => 'khadija@formateur.com', 'password' => bcrypt('password'), 'role_id' => 4],
        ]);
    }
}
