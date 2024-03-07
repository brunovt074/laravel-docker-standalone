<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Costumer;
use App\Models\Device;

class CostumerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $costumers = Costumer::factory()->count(10)->create();

        $costumers->each(function($costumer){
            Device::factory()->count(rand(1,2))->create([
                'costumer_id' => $costumer->id,
            ]);
        });

    }
}
