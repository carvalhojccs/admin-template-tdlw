<?php

namespace App\Livewire\Plans;

use App\Models\Plan;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Illuminate\Database\Eloquent\Collection;

#[On('plans::refresh')]
class Index extends Component
{
    use WithPagination;
    public ?int $quantity = 10;
    public ?string $search = null;

    #[Computed()]
    public function headers(): array
    {
        return [
            ['index' => 'id', 'label' => '#'],
            ['index' => 'name', 'label' => 'Nome'],
            ['index' => 'price', 'label' => 'Preço'],
            ['index' => 'description', 'label' => 'Descrição'],
            ['index' => 'created_at', 'label' => 'Criado em'],
            ['index' => 'updated_at', 'label' => 'Atualizado em'],
            ['index' => 'action', 'label' => 'Ação'],
        ];
    }

    #[Computed()]
    public function rows()
    {
        return Plan::query()
            ->when($this->search, function ($query) {
                return $query->where('name', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%");
            })
            ->paginate($this->quantity)
            ->withQueryString();
    }

    #[Computed()]
    public function records(): Collection
    {
        return \App\Models\Plan::all();
    }

    public function render()
    {
        return view('livewire.plans.index');
    }
}
