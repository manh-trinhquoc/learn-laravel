<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use DB;
use File;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('states')->truncate();
        Schema::enableForeignKeyConstraints();

        $path = base_path() . '/database/seeders/data/state-abb.json';
        $file = File::get($path);
        $data = json_decode($file, true);
        DB::table('states')->insert($data);
    }
}
