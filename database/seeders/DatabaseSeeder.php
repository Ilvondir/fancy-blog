<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            ArticleSeeder::class,
            CommentSeeder::class,
            TagSeeder::class
        ]);

        for ($i=1; $i <= 5; $i++) {
            $rand1 = random_int(1, Tag::count());
            $rand2 = $rand1;
            while ($rand2 == $rand1) $rand2 = random_int(1, Tag::count());
            
            DB::insert("INSERT INTO articles_tags VALUES (null, ?, ?);", [$i, $rand1]);
            DB::insert("INSERT INTO articles_tags VALUES (null, ?, ?);", [$i, $rand2]);
        }
        
    }
}