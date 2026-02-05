<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // creates a user if not exists
            'content' => $this->faker->paragraph(rand(1, 3)),
            'image' => $this->faker->boolean(50)
                ? $this->faker->imageUrl(800, 600, 'nature', true)
                : null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
