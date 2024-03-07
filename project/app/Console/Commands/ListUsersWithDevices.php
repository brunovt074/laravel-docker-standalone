<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Costumer;

class ListUsersWithDevices extends Command
{
    protected $signature = 'users:list';

    protected $description = 'List users with their devices';

    public function handle()
    {
        $costumers = Costumer::all();

        foreach ($costumers as $costumer) {
            $this->info("Nombre: {$costumer->name}");

            if ($costumer->devices->isNotEmpty()) {
                $this->info("  Dispositivos");
                foreach ($costumer->devices as $index => $device) {
                    $this->info("   " . ($index + 1) . ". {$device->brand} {$device->model}");
                }
            } else {
                $this->info("  No tiene dispositivos.");
            }
        }
    }
}