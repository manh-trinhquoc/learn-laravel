<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\State;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('events')->truncate();
        Schema::enableForeignKeyConstraints();
        $limit = 50;
        $path = base_path() . '/database/seeders/data/free-zipcode-database.csv';
        $zip_code_data = $this->csvToArray($path, ',', $limit);

        $faker = \Faker\Factory::create();

        foreach (range(1, $limit) as $index) {
            $randInt = $faker->numberBetween(0, $limit - 1);
            $state_abbr = $zip_code_data[$randInt]['State'];
            // $state_id = DB::table('states')->where('abbreviation', $state_abbr)->first()->id;
            $state_id = State::where('abbreviation', $state_abbr)->limit(1)->orderByRaw('RAND()')->first()->id;

            $user_id = User::addSelect('id')->limit(1)->orderByRaw('RAND()')->first()->id;
            $category_id = Category::addSelect('id')->limit(1)->orderByRaw('RAND()')->first()->id;

            Event::create([
                'name' => $faker->sentence(2),
                'venue' => $faker->company,
                'city' => $zip_code_data[$randInt]['City'],
                'zip' => $zip_code_data[$randInt]['Zipcode'],
                'state_id' => $state_id,
                'max_attendees' => $faker->numberBetween($min = 1, $max = 90),
                'description' => $faker->paragraphs(1, true),
                'started_at' => $faker->dateTimeBetween('now', '1 year'),
                'user_id' => $user_id,
                'category_id' => $category_id
            ]);
        }
    }

    private function csvToArray($filename = '', $delimiter = ',', $limit = PHP_INT_MAX)
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            return false;
        }

        $header = null;
        $data = [];
        if (($handle = fopen($filename, 'r')) !== false) {
            $count = 0;
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if ($count > $limit) {
                    break;
                }
                $count++;
                if (!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }

        return $data;
    }
}
