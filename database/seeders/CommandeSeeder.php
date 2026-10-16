<?php
declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commande;

class CommandeSeeder extends Seeder
{
    public function run(): void
    {
        Commande::factory()->count(20)->create();
    }
}
