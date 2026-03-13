<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Products;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'image' => fake()->imageUrl('100','100','cloths',true),
            'price' => fake()->numberBetween('100','50000'),
            'description'=> fake()->sentence(),
            'category_id' => Category::query()->inRandomOrder()->value('id'),
           
           
        ];
    }
}
