<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Laravel and Coffee',
            'enabled' => 1,
            // 'start' => '2017-12-01 15:00:00',
            // 'max_attendees' => 3,
            'venue' => 'City Coffee Shop',
            'city' => 'Dublin',
            'description' => "Let's drink coffee and learn Laravel together!"
        ];
    }
}