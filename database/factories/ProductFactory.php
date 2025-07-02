<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pro_name' => $this->faker->name(),
            'pro_price' => $this->faker->randomFloat(2,1,200),
            'pro_quantity' => $this->faker->numberBetween(1,100),
            'pro_discount' => $this->faker->randomFloat(1,10,99),
            'category_id' => $this->faker->numberBetween(1,2),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
