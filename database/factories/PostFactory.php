<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'post_body' => $this->faker->paragraph(1000),
            'user_id' => rand(1, 10),
            'post_image_path' => '/post-images/'.$this->faker->image('public/storage/post-images', 900 , 500, null, false),
        ];
    }
}
