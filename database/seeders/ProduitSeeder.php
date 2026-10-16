<?php
declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produit;

class ProduitSeeder extends Seeder
{
    public function run(): void
    {
        Produit::factory()->count(20)->create();
    }
}
