<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UtilisateurSeeder extends Seeder
{
    public function run(): void
{
    DB::table('utilisateurs')->insert([
        ['nom_user' => 'oussama', 'age' => 22, 'telephone' => '0612345678', 'email' => 'oussamamame@efp.com', 'adresse' => 'Casablanca', 'password'=>'12345' ,'id_roles' => 1],
        ['nom_user' => 'jalal', 'age' => 20, 'telephone' => '0612345679', 'email' => 'jalalmahmoudi@efp.com', 'adresse' => 'Rabat','password'=>'12345', 'id_roles' => 2],
        ['nom_user' => 'houssam', 'age' => 22, 'telephone' => '0612345680', 'email' => 'houssamkhalil@efp.com', 'adresse' => 'Marrakech','password'=>'12345', 'id_roles' => 3],
        ['nom_user' => 'omar', 'age' => 20, 'telephone' => '0612345681', 'email' => 'omar@efp.com', 'adresse' => 'Tanger','password'=>'12345', 'id_roles' => 4],
    ]);
}
}