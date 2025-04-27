<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\DirectionRegionaleSeeder;
use Database\Seeders\ComplexeSeeder;
use Database\Seeders\EfpSeeder;
use Database\Seeders\AtelierSeeder;
use Database\Seeders\CategorieSeeder;
use Database\Seeders\FrequenceSeeder;
use Database\Seeders\EquipementIdentifieSeeder;
use Database\Seeders\EquipementTracableSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UtilisateurSeeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    $this->call([
        DirectionRegionaleSeeder::class,
        ComplexeSeeder::class,
        EfpSeeder::class,
        AtelierSeeder::class,
        CategorieSeeder::class,
        FrequenceSeeder::class,
        EquipementIdentifieSeeder::class,
        EquipementTracableSeeder::class,
        RoleSeeder::class,
        UtilisateurSeeder::class,
        AnomalieSeeder::class, // Ensure this is included
        OperationSeeder::class, // Ensure this is included
        IntervenantSeeder::class, // Ensure this is included
        EffectuerSeeder::class, // Ensure this is included
    ]);

    // Check if the user already exists before creating
    if (!User ::where('email', 'test@example.com')->exists()) {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
}
