<?php

namespace App\Observers;

use App\Models\Plan;
use Illuminate\Support\Str;

class PlanObserver
{
    public function creating(Plan $plan): void
    {
        $plan->url = Str::slug($plan->name);
    }

    public function created(Plan $plan): void
    {
        //
    }


    public function updated(Plan $plan): void
    {
        //
    }


    public function deleted(Plan $plan): void
    {
        //
    }


    public function restored(Plan $plan): void
    {
        //
    }


    public function forceDeleted(Plan $plan): void
    {
        //
    }
}
