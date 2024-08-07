<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(5)->create();

        Category::create([
            'name' => 'Programmming',
            'slug' => 'programming'
        ]);
        Category::create([
            'name' => 'Hobby',
            'slug' => 'hobby'
        ]);
        Category::create([
            'name' => 'Machine Learning',
            'slug' => 'machine-learning'
        ]);
        Category::create([
            'name' => 'Web Development',
            'slug' => 'web-development'
        ]);
        Category::create([
            'name' => 'Gaming',
            'slug' => 'gaming'
        ]);

        Post::factory(20)->create();
    }
}
