<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Post::factory(200)->create();
        Post::factory(300)->create()->each(function($post){
            $category = Category::get()->random()->id;
            $post->categories()->attach($category);
        });
    }
}
