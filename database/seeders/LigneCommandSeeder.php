<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class LigneCommandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $commandIds = DB::table('commands')->pluck('id');
        $productIds = DB::table('products')->pluck('id');

        for ($i = 0; $i < 50; $i++) {
            $productId = $faker->randomElement($productIds);
            $productPrice = DB::table('products')->where('id', $productId)->value('pu');

            DB::table('ligne_command')->insert([
                'command_id' => $faker->randomElement($commandIds),
                'product_id' => $productId,
                'quantity' => $faker->numberBetween(1, 5),
                'price_per_unit' => $productPrice,
                'total_price' => $productPrice * $faker->numberBetween(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
}