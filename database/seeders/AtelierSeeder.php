<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AtelierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ateliers')->insert([
            ['id_atelier' => 1, 'nom_atelier' => 'Atelier Mécanique', 'id_efp' => 1],
            ['id_atelier' => 2, 'nom_atelier' => 'Atelier Électrique', 'id_efp' => 2],
        ]);
    }
}
