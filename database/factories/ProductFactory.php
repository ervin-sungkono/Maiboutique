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
            'product_name' => $this->faker->sentence(3),
            'product_image' => 'images/dummy.png',
            'product_price' => $this->faker->numberBetween(10000,200000),
            'product_desc' => $this->faker->text(),
        ];
    }
}
