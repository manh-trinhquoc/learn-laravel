<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $titleList = [
            'Php developer', 'laravel developer', 'designer', 'tester', 'BA', 'PM', 'wordpress developer', 'frontend developer'
        ];

        return [
            'title' => $titleList[$this->faker->numberBetween(0, 7)],
            'zip_code' => $this->faker->postcode(),
            'time_zone' => $this->faker->timezone(),
        ];
    }
}
