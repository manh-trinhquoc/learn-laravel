<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('events')->truncate();

        $faker = \Faker\Factory::create();

        foreach (range(1, 50) as $index) {
            Event::create([
                'name' => $faker->sentence(2),
                'venue' => $faker->company,
                'city' => $faker->city,
                'zip' => $faker->countryCode(),
                'max_attendees' => $faker->numberBetween($min = 1, $max = 90),
                'description' => $faker->paragraphs(1, true),
                'started_at' => $faker->dateTimeBetween('now', '1 year')
            ]);
        }
    }
}