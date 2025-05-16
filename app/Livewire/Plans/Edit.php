<?php

namespace App\Livewire\Plans;

use App\Models\Plan;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;
use TallStackUi\Traits\Interactions;

class Edit extends Component
{
    use Interactions;
    public bool $modal = false;
    public ?Plan $plan = null;
    public ?string $name = null;
    public ?string $description = null;
    public ?string $price = null;

    #[On('plans::edit')]
    public function open(int $id): void
    {
        $this->plan = Plan::findOrFail($id);
        $this->name = $this->plan->name;
        $this->description = $this->plan->description;
        $this->price = str_replace(['R$', "\u{A0}"], '',$this->plan->price);
        $this->modal = true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('plans', 'name')->ignore($this->plan->id)],
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

    public function handle(): void
    {
        $this->price = str_replace('.', '', $this->price);
        $this->price = str_replace(',', '.', $this->price);
         $this->validate();
        $this->plan->update([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ]);
        $this->toast()->success('Plano atualizado com sucesso!')->send();
        $this->reset();
        $this->redirect(Plans::class);
    }

    public function render()
    {
        return view('livewire.plans.edit');
    }
}
