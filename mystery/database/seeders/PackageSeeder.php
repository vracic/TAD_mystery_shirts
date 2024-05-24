<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            ['name' => 'MAN FOOTBALL SHIRT BOX', 'type' => 'male', 'price' => 75.00],
            ['name' => 'WOMAN FOOTBALL SHIRT BOX', 'type' => 'female', 'price' => 75.00],
            ['name' => 'KIDS FOOTBALL SHIRT BOX', 'type' => 'kids', 'price' => 35.00],
            ['name' => 'RETRO FOOTBALL SHIRT BOX', 'type' => 'retro', 'price' => 75.00],
            ['name' => 'VINTAGE FOOTBALL SHIRT BOX', 'type' => 'vintage', 'price' => 75.00],
            ['name' => '2020-2024 SEASON FOOTBALL SHIRT BOX', 'type' => 'new', 'price' => 35.00],
        ];

        DB::table('packages')->insert($packages);
    }
}
