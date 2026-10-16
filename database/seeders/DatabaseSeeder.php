<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'ndiaye@gmail.com',
            'password' => 'Passer123',
        ]);

        $this->call([
            PostSeeder::class,
            ServiceSeeder::class,
            CategorySeeder::class,
            ProduitSeeder::class,
            CommandeSeeder::class,
            ElementCommandeSeeder::class,
        ]);
    }
}
