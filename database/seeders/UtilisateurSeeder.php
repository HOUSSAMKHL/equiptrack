<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UtilisateurSeeder extends Seeder
{
    public function run(): void
{
    DB::table('utilisateurs')->insert([
        ['nom_user' => 'Ahmed', 'age' => 30, 'telephone' => '0612345678', 'email' => 'ahmed@dr.com', 'adresse' => 'Casablanca', 'id_roles' => 1],
        ['nom_user' => 'Sara', 'age' => 28, 'telephone' => '0612345679', 'email' => 'sara@complexe.com', 'adresse' => 'Rabat', 'id_roles' => 2],
        ['nom_user' => 'Yassine', 'age' => 35, 'telephone' => '0612345680', 'email' => 'yassine@efp.com', 'adresse' => 'Marrakech', 'id_roles' => 3],
        ['nom_user' => 'Khadija', 'age' => 32, 'telephone' => '0612345681', 'email' => 'khadija@formateur.com', 'adresse' => 'Tanger', 'id_roles' => 4],
    ]);
}
}