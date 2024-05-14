<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// ProductSeeder.php
use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $categoryIds = DB::table('categories')->pluck('id');

        for ($i = 0; $i < 20; $i++) {
            DB::table('products')->insert([
                'desg' => $faker->word,
                'qtes' => $faker->numberBetween(1, 100),
                'pu' => $faker->randomFloat(2, 10, 1000),
                'photo' => $faker->imageUrl(640, 480, 'technics'),
                'category_id' => $faker->randomElement($categoryIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
