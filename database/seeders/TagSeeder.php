<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::insert([
            ["name" => "PHP", "color" => "#B803FF"],
            ["name" => "Java", "color" => "#FA9C1B"],
            ["name" => "Databases", "color" => "#808080"],
            ["name" => "AI", "color" => "#48CEA4"],
            ["name" => "Deep Learning", "color" => "#68EEC4"],
            ["name" => "Math", "color" => "#A020F0"],
        ]);
    }
}