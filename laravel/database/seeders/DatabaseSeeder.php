<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([StateTableSeeder::class]);
        $this->call([CategoryTableSeeder::class]);
        $this->call([UserSeeder::class]);
        $this->call([EventTableSeeder::class]);
    }
}
