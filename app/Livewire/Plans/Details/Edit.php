<?php

namespace App\Livewire\Plans\Details;

use App\Models\PlanDetail;
use Livewire\Component;
use Livewire\Attributes\On;
use TallStackUi\Traits\Interactions;

class Edit extends Component
{
    use Interactions;

    public ?PlanDetail $planDetail = null;
    public bool $modal = false;
    public ?int $detailId = null;
    public ?string $name = null;

    #[On('plans::details::edit')]
    public function open(int $detailId): void
    {
        $this->planDetail = PlanDetail::findOrFail($detailId);
        $this->name = $this->planDetail->name;
        $this->modal = true;
    }

    public function close(): void
    {
        $this->modal = false;
        $this->reset('name');
    }

    public function handle(): void
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $this->planDetail->update([
            'name' => $this->name,
        ]);

        $this->toast()->success('Detalhe atualizado com sucesso!')->send();
        $this->reset('name');
        $this->modal = false;
        $this->dispatch('plans::details::refresh');
    }

    public function render()
    {
        return view('livewire.plans.details.edit');
    }
}
