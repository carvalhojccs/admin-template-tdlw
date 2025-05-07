<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use TallStackUi\Traits\Interactions;

class Create extends Component
{
    use Interactions; 

    public bool $modal = false;
    public string $name = '';
    public string $email = '';

    public function rules(): array
    {
        return [
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255', Rule::unique(User::class, 'email')],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve ser um endereço de e-mail válido.',
        ];
    }

    #[On('users::create')]
    public function open(): void
    {
        $this->modal = true;
    }

    public function handle(): void
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make('password'),
        ]);

        $this->toast()->success('Usuário criado com sucesso!')->send();
        $this->reset();
        $this->dispatch('users::refresh');
    }

    public function render(): View
    {
        return view('livewire.users.create');
    }
}
