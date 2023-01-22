<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->name;
        return [
            'product_name'      => $name,
            'category_id'       => rand(1, 2),
            'slug'              => Str::slug($name),
            'product_price'     => rand(100, 1000),
            'short_description' => fake()->regexify('[A-Za-z0-9]{10}'),
            'description'       => fake()->regexify('[A-Za-z0-9]{30}'),
            'stock_quantity'    => 1,
            'is_active'         => 1
        ];
    }
}
