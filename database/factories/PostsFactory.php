<?php

namespace Database\Factories;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Posts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'description' => $this->faker->text(80),
            'image' =>  $this->faker->imageUrl(1280,720),
            'extract' => $this->faker->text(80),
            'status' => $this->faker->randomElement([1,2]),
            'user_id' =>rand(1,100),
            'category_id' =>rand(1,100)
            
        ];
    }
}
