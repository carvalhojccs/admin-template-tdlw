<x-cards.card>
    <x-breadcrumb>
        <x-breadcrumb.item :route="route('users.users')">{{ __('Usuários') }}</x-breadcrumb.item>
    </x-breadcrumb>
    <x-cards.card-section py="py-2">
        <x-zmd-button text="Novo" color="orange" sm wire:click="$dispatch('users::create')"/>
    </x-cards.card-section>

    <x-cards.card-section>
        <livewire:users.index />
        <livewire:users.create />
        <livewire:users.edit />
        <livewire:users.destroy />
    </x-cards.card-section>
</x-cards.card>
