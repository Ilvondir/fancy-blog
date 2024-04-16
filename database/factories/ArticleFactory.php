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

        $sentence = fake()->sentence();
        return [
            "title" => substr($sentence, 0, strlen($sentence) - 1),
            "content" => fake()->text(1000),
            "published" => fake()->date(),
            "image" => fake()->imageUrl(),
            "user_id" => 7
        ];
    }
}