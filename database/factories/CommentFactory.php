<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{

    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            "author"    =>$this->faker->name,
            "content"   =>$this->faker->paragraph,
            "posts_id"  =>Post::factory()
        ];
    }
}
