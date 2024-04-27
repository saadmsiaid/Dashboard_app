<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Command;
use Faker\Factory as Faker;

class CommandsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Command::create([
                'client_id' => $faker->numberBetween(1, 10), 
                'total_amount' => $faker->randomFloat(2, 10, 1000), 
                'status' => $faker->randomElement(['pending', 'processing', 'completed']),
              
            ]);
        }
    }
}
