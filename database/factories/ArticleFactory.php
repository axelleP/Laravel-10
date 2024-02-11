<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->text(),
            'price' => fake()->randomFloat(2, 0, 999999.99),//2 décimales après la virgule
            'image' => '1656001927_bb633eb9d4e4e96ba1ab.png',
        ];
    }
}
