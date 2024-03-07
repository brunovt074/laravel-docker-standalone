<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Costumer;
use App\Models\Device;

class CostumerTest extends TestCase
{
    /**
     * Prueba si un Customer tiene mas de un dispositivo
     *
     * @return void
     */
    public function test_costumer_can_be_created_with_devices()
    {
        
        $costumer = Costumer::factory()->create();

        $device1 = Device::factory()->create(['costumer_id' => $costumer->id]);
        $device2 = Device::factory()->create(['costumer_id' => $costumer->id]);        
        
        $this->assertDatabaseHas('devices', ['id' => $device1->id, 'costumer_id' => $costumer->id]);
        $this->assertDatabaseHas('devices', ['id' => $device2->id, 'costumer_id' => $costumer->id]);
        
    }

    /**
     * Prueba si un Customer no tiene dispositivos
     *
     * @return void
     */
    public function test_costumer_can_be_created_without_devices()
    {
        $costumer = Costumer::factory()->create();

        $this->assertTrue($costumer->devices->isEmpty());
    }
}