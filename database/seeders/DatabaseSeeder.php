<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 authors
        Author::factory(10)->create()->each(function ($author) {
            // Each author has 1-5 posts
            $posts = Post::factory(rand(1, 5))->create([
                'author_id' => $author->id
            ]);

            // Each post has 0-10 comments
            $posts->each(function ($post) {
                Comment::factory(rand(0, 10))->create([
                    'post_id' => $post->id
                ]);
            });
        });
    }
}
