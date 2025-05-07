<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Illuminate\Database\Eloquent\Collection;

#[On('users::refresh')]
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
            ['index' => 'email', 'label' => 'Email'],
            ['index' => 'created_at', 'label' => 'Criado em'],
            ['index' => 'updated_at', 'label' => 'Atualizado em'],
            ['index' => 'action', 'label' => 'Ação'],
        ];
    }

    #[Computed()]
    public function rows()
    {
        return User::query()
            ->when($this->search, function ($query) {
                return $query->where('name', 'like', "%{$this->search}%")
                      ->orWhere('email', 'like', "%{$this->search}%");
            })
            ->paginate($this->quantity)
            ->withQueryString();
    }

    #[Computed()]
    public function records(): Collection
    {
        return User::all();
    }

    public function render()
    {
        return view('livewire.users.index');
    }
}
