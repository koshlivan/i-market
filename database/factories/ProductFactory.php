<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 5),
            'name' => $this->faker->words(3, true),
            'brand' => $this->faker->word(),
            'code' => $this->faker->word(),
            'rating' => $this->faker->numberBetween(1, 5),
            'price' => $this->faker->numberBetween(1, 100000),
            'description' => $this->faker->text(200)
        ];
    }
}
