<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "content" => fake()->text(50),
            "written" => fake()->date(),
            "post_id" => fake()->numberBetween(1, Post::count()),
            "user_id" => fake()->numberBetween(1, User::count()),
        ];
    }
}