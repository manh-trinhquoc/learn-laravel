<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use DB;
use File;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('categories')->truncate();
        Schema::enableForeignKeyConstraints();

        $path = base_path() . '/database/seeders/data/categories.json';
        $file = File::get($path);
        $data = json_decode($file, true);
        $data = collect($data)->map(function ($item) {
            return [
                'name' => $item
            ];
        });
        $data = $data->toArray();
        DB::table('categories')->insert($data);
    }
}
