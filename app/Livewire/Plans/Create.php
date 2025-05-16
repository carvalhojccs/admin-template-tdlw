<?php

namespace App\Livewire\Plans;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;
use TallStackUi\Traits\Interactions;

class Create extends Component
{
    use Interactions;

    public bool $modal = false;
    public ?string $name = null;
    public ?string $description = null;
    public ?string $price = null;

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('plans', 'name')],
            'description' => ['nullable','min:3', 'max:255'],
            'price' => ['required', 'numeric'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Este campo é obrigatório.',
            'description.min' => 'Este deve conter no mínimo 3 caracteres.',
            'description.max' => 'Este campo deve conter no máximo 255 caracteres.',
            'price.required' => 'Este campo é obrigatório.',
        ];
    }

    #[On('plans::create')]
    public function open(): void
    {
        $this->modal = true;
    }

    public function close(): void
    {
        $this->modal = false;
        $this->reset();
    }

    public function handle(): void
    {
        $this->price = str_replace('.', '', $this->price);
        $this->price = str_replace(',', '.', $this->price);

        $this->validate();

        \App\Models\Plan::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ]);

        $this->toast()->success('Plano criado com sucesso!')->send();
        $this->reset();
        $this->dispatch('plans::refresh');
    }

    public function render()
    {
        return view('livewire.plans.create');
    }
}
