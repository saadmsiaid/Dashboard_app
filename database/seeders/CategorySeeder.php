<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// CategorySeeder.php
use App\Models\Category;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $index) {
            Category::create([
                'name' => $faker->word,
                'photo' => $faker->imageUrl($width = 200, $height = 200),
                'desc' => $faker->sentence
            ]);
        }
    }
}
