<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// ProductSeeder.php
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Product::create([
                'desg' => $faker->sentence,
                'qtes' => $faker->numberBetween(1, 100),
                'pu' => $faker->randomFloat(2, 10, 1000),
                'photo' => $faker->imageUrl($width = 200, $height = 200, ),
                'category_id' => $faker->numberBetween(3, 17) 
            ]);
        }
    }
}
