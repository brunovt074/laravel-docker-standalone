<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Costumer;
use App\Models\Device;
use Faker\Factory as Faker;

class CostumerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $level = $faker->numberBetween(0, 5);

            $costumer = Costumer::create([
                'name' => $faker->name,
                'level' => $level,
                'address' => $faker->address,
            ]);

            
            $numDevices = $faker->numberBetween(0, 2);

            
            for ($j = 0; $j < $numDevices; $j++) {
                $brand = $faker->company;
                $model = $faker->word;

                Device::create([
                    'costumer_id' => $costumer->id,
                    'brand' => $brand,
                    'model' => $model,
                ]);
            }
        }
    }
}
