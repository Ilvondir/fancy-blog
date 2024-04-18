<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(5)->create();

        User::create([
            "first_name" => "Michael",
            "last_name" => "Annas",
            "login" => "admin",
            "password" => Hash::make("password"),
            "email" => "admin@fb.com",
            "role_id" => 1
        ]);

        User::create([
            "first_name" => "Agatha",
            "last_name" => "Bird",
            "login" => "journalist",
            "password" => Hash::make("password"),
            "email" => "journalist@fb.com",
            "role_id" => 2
        ]);

        User::create([
            "first_name" => null,
            "last_name" => null,
            "login" => "user",
            "password" => Hash::make("password"),
            "email" => "user@fb.com",
            "role_id" => 3
        ]);
    }
}