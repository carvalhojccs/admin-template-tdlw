<?php

namespace App\Livewire\Plans\Details;

use App\Models\Plan;
use Livewire\Component;
use Livewire\Attributes\On;

class Index extends Component
{
    public ?Plan $plan;

#[On('plans::details::refresh')]
public function refreshDetails()
{
    $this->dispatch('$refresh');
}

    public function render()
    {
        return view('livewire.plans.details.index', [
            'details' => $this->plan->details,
        ]);
    }
}
