<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// LigneCommandSeeder.php
use App\Models\LigneCommand;
use Faker\Factory as Faker;

class LigneCommandSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            LigneCommand::create([
                'command_id' => $faker->numberBetween(1, 9), // Assuming you have 10 commands
                'product_id' => $faker->numberBetween(1, 10), // Assuming you have 10 products
                'quantity' => $faker->numberBetween(1, 10),
                'price_per_unit' => $faker->randomFloat(2, 10, 100),
                'total_price' => $faker->randomFloat(2, 100, 1000)
            ]);
        }
    }
}
