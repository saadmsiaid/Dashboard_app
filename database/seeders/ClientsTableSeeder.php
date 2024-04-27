<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use Faker\Factory as Faker;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Client::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'avatar' => $faker->imageUrl($width = 200, $height = 200),
            ]);
        }
    }
}
