<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;
use TallStackUi\Traits\Interactions;

class Destroy extends Component
{
    use Interactions;

    public ?int $id = null;
    public ?string $name = null;
    public bool $modal = false;

    private function itIsMe(int $id): bool
    {
        return Auth::user()->id == $id;
    }


    #[On('users::destroy')]
    public function open(int $id): void
    {
        if ($this->itIsMe($id)) {
            $this->toast()->error('Você não pode excluir a si mesmo!')->send();
            return;
        }

        $user = User::findOrFail($id);

        $this->id = $user->id;
        $this->name = $user->name;
        $this->modal = true;
    }

    public function handle(): void
    {
        if ($this->itIsMe($this->id)) {
            $this->toast()->error('Você não pode excluir a si mesmo!')->send();
            return;
        }

        $user = User::findOrFail($this->id);
        $user->delete();

        $this->toast()->success('Usuário excluído com sucesso!')->send();
        $this->reset();
        $this->dispatch('users::refresh');
    }

    public function render()
    {
        return view('livewire.users.destroy');
    }
}
