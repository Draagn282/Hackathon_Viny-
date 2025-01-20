<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comments;

class CommentsFactory extends Factory
{
    /**
     * The name of the model that this factory is associated with.
     *
     * @var string
     */
    protected $model = Comments::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->sentence, // Generates a random sentence
            'blogs_id' => $this->faker->numberBetween(1, 10), // Random blog ID between 1 and 10
            'account_id' => $this->faker->numberBetween(1, 10), // Random account ID between 1 and 10
        ];
    }
}
