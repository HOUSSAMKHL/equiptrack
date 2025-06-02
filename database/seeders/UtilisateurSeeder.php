<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;  // Import du facade Hash

class UtilisateurSeeder extends Seeder
{
    public function run(): void
    {
       DB::table('utilisateurs')->insert([
    [
        'nom_user' => 'admin', 
        'age' => 22, 
        'telephone' => '0612345678', 
        'email' => 'admin@efp.com', 
        'adresse' => 'Casablanca', 
        'password' => Hash::make('12345'), 
        'id_roles' => 5,
        'id_DR' => null,
        'id_complexe' => null,
        'id_etablissement' => null,
    ],
    [
        'nom_user' => 'oussama', 
        'age' => 22, 
        'telephone' => '0612345678', 
        'email' => 'oussamamame@efp.com', 
        'adresse' => 'Casablanca', 
        'password' => Hash::make('12345'), 
        'id_roles' => 1,
        'id_DR' => 1,
        'id_complexe' => null,
        'id_etablissement' => null,
    ],
    [
        'nom_user' => 'jalal', 
        'age' => 20, 
        'telephone' => '0612345679', 
        'email' => 'jalalmahmoudi@efp.com', 
        'adresse' => 'Rabat',
        'password' => Hash::make('12345'), 
        'id_roles' => 2,
        'id_DR' => 1,
        'id_complexe' => 1,
        'id_etablissement' => null,
    ],
    [
        'nom_user' => 'houssam', 
        'age' => 22, 
        'telephone' => '0612345680', 
        'email' => 'houssamkhalil@efp.com', 
        'adresse' => 'Marrakech',
        'password' => Hash::make('12345'), 
        'id_roles' => 3,
        'id_DR' => 1,
        'id_complexe' => 1,
        'id_etablissement' => 1,
    ],
    [
        'nom_user' => 'omar', 
        'age' => 20, 
        'telephone' => '0612345681', 
        'email' => 'omar@efp.com', 
        'adresse' => 'Tanger',
        'password' => Hash::make('12345'), 
        'id_roles' => 4,
        'id_DR' => 1,
        'id_complexe' => 1,
        'id_etablissement' => 1,
    ],
]);

    }
}
