<x-cards.card>
    <x-breadcrumb>
        <x-breadcrumb.item :route="route('plans.plans')">{{ __('Planos') }}</x-breadcrumb.item>
    </x-breadcrumb>
    <x-cards.card-section py="py-2">
        <x-zmd-button text="Novo" color="orange" sm wire:click="$dispatch('plans::create')"/>
    </x-cards.card-section>

    <x-cards.card-section>
        <livewire:plans.index />
        <livewire:plans.create />
    </x-cards.card-section>
</x-cards.card>