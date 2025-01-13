<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Blogs;

class BlogsFactory extends Factory
{
    /**
     * The name of the model that this factory is associated with.
     *
     * @var string
     */
    protected $model = Blogs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'header' => $this->faker->sentence, // Generates a random sentence
            'description' => $this->faker->paragraph, // Generates a random paragraph
            'account_id' => $this->faker->numberBetween(1, 2), // Random account ID between 1 and 10
        ];
    }
}
