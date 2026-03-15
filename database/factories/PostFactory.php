<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{

    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'id'          => $this->faker->uuid,
            'title'       => $this->faker->sentence,
            'body'        => $this->faker->text,
            'author'      => $this->faker->name,
            'published'   => $this->faker->boolean
        ];
    }
}
