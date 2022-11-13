<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'imageUrl' => 'images/dummy.png',
            'price' => ($this->faker->numberBetween(10,200) * 1000),
            'description' => $this->faker->text(),
            'stock' => $this->faker->numberBetween(1,10),
        ];
    }
}
