<?php

namespace App\Livewire\Plans\Details;

use App\Models\Plan;
use Livewire\Component;
use Livewire\Attributes\On;
use TallStackUi\Traits\Interactions;

class Create extends Component
{
    use Interactions;

    public ?Plan $plan = null;
    public bool $modal = false;
    public ?int $planId = null;
    public ?string $name = null;

    #[On('plans::details::create')]
    public function open(int $planId): void
    {
        $this->planId = $planId;
        $this->modal = true;
    }

    public function close(): void
    {
        $this->modal = false;
        $this->reset();
    }

    public function handle(): void
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $this->plan->details()->create([
            'name' => $this->name,
        ]);

        $this->toast()->success('Detalhe criado com sucesso!')->send();
        $this->reset('name');
        $this->modal = false;
        $this->dispatch('plans::details::refresh');
    }

    public function render()
    {
        return view('livewire.plans.details.create');
    }
}
