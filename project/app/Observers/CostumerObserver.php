<?php

namespace App\Observers;

use App\Models\Costumer;
use App\Models\Device;
use Illuminate\Support\Facades\Notification;

class CostumerObserver
{
    /**
     * Handle the Costumer "created" event.
     */
    public function created(Costumer $costumer): void
    {
        //
    }

    /**
     * Handle the Costumer "updated" event.
     */
    public function updated(Costumer $costumer): void
    {
        
        
    }

    /**
     * Handle the Costumer "deleted" event.
     */
    public function deleted(Costumer $costumer): void
    {
        //
    }

    /**
     * Handle the Costumer "restored" event.
     */
    public function restored(Costumer $costumer): void
    {
        //
    }

    /**
     * Handle the Costumer "force deleted" event.
     */
    public function forceDeleted(Costumer $costumer): void
    {
        //
    }
}
