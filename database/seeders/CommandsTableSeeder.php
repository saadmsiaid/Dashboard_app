<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Command;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CommandsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $clientIds = DB::table('clients')->pluck('id');

        for ($i = 0; $i < 30; $i++) {
            DB::table('commands')->insert([
                'client_id' => $faker->randomElement($clientIds),
                'total_amount' => $faker->randomFloat(2, 50, 5000),
                'status' => $faker->randomElement(['pending', 'processing', 'shipped', 'delivered']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
