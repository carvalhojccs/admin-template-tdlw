<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use TallStackUi\Traits\Interactions;

class Edit extends Component
{
    use Interactions;

    public bool $modal = false;
    public ?User $user = null;
    public ?string $name = null;
    public ?string $email = null;

    #[On('users::edit')]
    public function open(int $id): void
    {
        $this->user = User::findOrFail($id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->modal = true;
    }

    public function handle(): void
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->toast()->success('Usuário atualizado com sucesso!')->send();
        $this->reset();
        $this->dispatch('users::refresh');
    }

    public function render()
    {
        return view('livewire.users.edit');
    }
}
