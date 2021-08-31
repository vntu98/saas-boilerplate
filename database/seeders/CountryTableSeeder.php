<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                'name' => 'Trinidad' ,
                'dial_code' => '1868'
            ],
            [
                'name' => 'Saint Kitts' ,
                'dial_code' => '1869'
            ],
            [
                'name' => 'Neves' ,
                'dial_code' => '1876'
            ],
            [
                'name' => 'Jamaica' ,
                'dial_code' => '242'
            ],
        ];

        Country::insert($countries);
    }
}
