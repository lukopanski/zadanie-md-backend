<?php

namespace Database\Factories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Todo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'finished' => false,
            'task' => $this->faker->text($maxNbChars = 50) ,
            'thumbnail_path' => $this->faker->imageUrl,
            'created' => now(),
        ];
    }
}