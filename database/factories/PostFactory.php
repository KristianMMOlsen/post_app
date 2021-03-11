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
        /* 
         * model factory to create test data, 
         * this factory creates a post consisting of 20 words 
         */
        return [
            'body' => $this->faker->sentence(20),
        ];
    }
}
