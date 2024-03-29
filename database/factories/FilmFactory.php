<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Film::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->words(2, true),
            'year' => $this->faker->date('Y-m-d', '-10 years'),
            'country' => $this->faker->country,
            'genre_id' => rand(1, 15),
        ];
    }
}
