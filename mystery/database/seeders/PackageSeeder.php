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
            ['name_en' => 'MAN FOOTBALL SHIRT BOX', 'name_es' => 'CAJA DE CAMISETA DE FUTBOL HOMBRE', 'type_es' => 'hombre', 'type_en' => 'male', 'price' => 75.00],
            ['name_en' => 'WOMAN FOOTBALL SHIRT BOX', 'name_es' => 'CAJA DE CAMISETA DE FUTBOL MUJER', 'type_es' => 'mujer','type_en' => 'female', 'price' => 75.00],
            ['name_en' => 'KIDS FOOTBALL SHIRT BOX', 'name_es' => 'CAJA DE CAMISETA DE FUTBOL NINOS', 'type_es' => 'ninos', 'type_en' => 'kids', 'price' => 35.00],
            ['name_en' => 'RETRO FOOTBALL SHIRT BOX', 'name_es' => 'CAJA DE CAMISETA DE FUTBOL RETRO', 'type_es' => 'retro', 'type_en' => 'retro', 'price' => 75.00],
            ['name_en' => 'VINTAGE FOOTBALL SHIRT BOX', 'name_es' => 'CAJA DE CAMISETA DE FUTBOL VINTAGE', 'type_es' => 'vintage', 'type_en' => 'vintage', 'price' => 75.00],
            ['name_en' => '2020-2024 SEASON FOOTBALL SHIRT', 'name_es' => 'CAJA DE CAMISETA DE FUTBOL 2020-2024', 'type_es' => 'nuevo', 'type_en' => 'new', 'price' => 35.00],
        ];

        DB::table('packages')->insert($packages);
    }
}
