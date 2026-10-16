<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
{
    protected $model = Produit::class;

    public function definition(): array
    {
        return [
            'libelle' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'image' => $this->faker->sentence(),
            'prix' => $this->faker->numberBetween(1, 9999),
            'categorie_id' => fn() => \App\Models\Category::factory(),
        ];
    }
}
