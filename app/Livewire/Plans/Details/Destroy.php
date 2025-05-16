<?php

namespace App\Livewire\Plans\Details;

use App\Models\PlanDetail;
use Livewire\Component;
use Livewire\Attributes\On;
use TallStackUi\Traits\Interactions;

class Destroy extends Component
{
    use Interactions;

    public ?int $detailId = null;
    public ?string $name = null;
    public bool $modal = false;

    #[On('plans::details::destroy')]
    public function open(int $detailId): void
    {
        $detail = PlanDetail::findOrFail($detailId);
        $this->detailId = $detailId;
        $this->name = $detail->name;
        $this->modal = true;
    }

    public function handle(): void
    {
        $detail = PlanDetail::findOrFail($this->detailId);
        $detail->delete();

        $this->toast()->success('Detalhe excluído com sucesso!')->send();
        $this->reset();
        $this->dispatch('plans::details::refresh');
    }

    public function render()
    {
        return view('livewire.plans.details.destroy');
    }
}
