<?php

namespace App\Livewire\Plans;

use App\Models\Plan;
use Livewire\Attributes\On;
use Livewire\Component;

#[On('plans::show::refresh')]
class Show extends Component
{
    public Plan $plan;
    public ?string $name = null;
    public ?string $description = null;
    public ?string $price = null;
    public ?int $id = null;
    public ?int $detailCount = null;

    public function mount(Plan $plan): void
    {
        $this->detailCount = $plan->details->count();
        $this->plan = $plan;
        $this->id = $plan->id;
        $this->name = $plan->name;
        $this->description = $plan->description;
        $this->price = $plan->price;
    }
    public function render()
    {
        return view('livewire.plans.show');
    }
}
