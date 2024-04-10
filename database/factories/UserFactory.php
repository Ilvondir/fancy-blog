<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    
    
    public function definition(): array
    {
        $name = fake()->unique()->firstName();
        
        return [
            "first_name" => $name,
            "last_name" => fake()->lastName(),
            "login" => $name,
            "password" => Hash::make("password"),
            "email" => fake()->unique()->email(),
            "role_id" => fake()->numberBetween(1,3)
        ];
    }
}