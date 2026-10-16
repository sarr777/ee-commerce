<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\ElementCommande;
use Illuminate\Database\Eloquent\Factories\Factory;

class ElementCommandeFactory extends Factory
{
    protected $model = ElementCommande::class;

    public function definition(): array
    {
        return [
            'prix' => $this->faker->numberBetween(1, 9999),
            'quantite' => $this->faker->numberBetween(1, 9999),
            'produit_id' => fn() => \App\Models\Produit::factory(),
            'commande_id' => fn() => \App\Models\Commande::factory(),
        ];
    }
}
