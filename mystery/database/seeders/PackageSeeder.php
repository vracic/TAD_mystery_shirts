<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            ['name' => 'Male Package', 'type' => 'male', 'price' => 75.00],
            ['name' => 'Female Package', 'type' => 'female', 'price' => 75.00],
            ['name' => 'Kids Package', 'type' => 'kids', 'price' => 35.00],
        ];

        DB::table('packages')->insert($packages);
    }
}
