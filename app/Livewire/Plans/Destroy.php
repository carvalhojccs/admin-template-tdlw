<?php

namespace App\Livewire\Plans;

use App\Models\Plan;
use Livewire\Component;
use Livewire\Attributes\On;
use TallStackUi\Traits\Interactions;

class Destroy extends Component
{
    use Interactions;

    public ?int $id = null;
    public ?string $name = null;
    public bool $modal = false;

    #[On('plans::destroy')]
    public function open(int $id): void
    {
        $plan = Plan::findOrFail($id);

        $this->id = $plan->id;
        $this->name = $plan->name;
        $this->modal = true;
    }

    public function handle(): void
    {
        $plan = Plan::findOrFail($this->id);
        $plan->delete();

        $this->toast()->success('Plano excluído com sucesso!')->send();
        $this->reset();
        $this->redirect(Plans::class);
    }

    public function render()
    {
        return view('livewire.plans.destroy');
    }
}
