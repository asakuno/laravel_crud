<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'name' => $this->faker->realText(10),
            'address' => $this->faker->realText(10),
            'description' => $this->faker->realText(50),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null,
        ];
    }
}
