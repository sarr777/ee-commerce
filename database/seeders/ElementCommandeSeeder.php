<?php
declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ElementCommande;

class ElementCommandeSeeder extends Seeder
{
    public function run(): void
    {
        ElementCommande::factory()->count(20)->create();
    }
}
