<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\Commande;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommandeFactory extends Factory
{
    protected $model = Commande::class;

    public function definition(): array
    {
        return [
            'date' => $this->faker->date('Y-m-d'),
            'code' => $this->faker->sentence(),
            'payment' => $this->faker->sentence(),
            'libelle' => $this->faker->sentence(),
            'statut' => $this->faker->sentence(),
        ];
    }
}
