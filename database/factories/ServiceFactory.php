<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        return [
            'libelle' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'image' => $this->faker->sentence(),
        ];
    }
}
