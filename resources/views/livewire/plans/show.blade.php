<x-cards.card>
    <x-breadcrumb>
        <x-breadcrumb.item :route="route('plans.plans')">{{ __('Planos') }}</x-breadcrumb.item>
        <x-breadcrumb.item>{{ __('Detalhes') }}</x-breadcrumb.item>
    </x-breadcrumb>
    <x-cards.card-section>
        <label for="name" class="dark:text-dark-400 mb-1 block text-sm font-semibold text-gray-600">Nome</label>
        <div class="relative rounded-md shadow-sm">
            <div
                class="focus:ring-primary-600 focus-within:focus:ring-primary-600 focus-within:ring-primary-600 dark:focus-within:ring-primary-600 flex rounded-md ring-1 focus-within:ring-2 dark:ring-dark-600 dark:text-dark-300 text-gray-600 ring-gray-300 dark:bg-dark-800 bg-white">
                <p
                    class="w-full rounded-md bg-transparent py-1.5 sm:text-sm sm:leading-6 text-gray-800 dark:text-dark-300">
                    <span class="ml-2">{{ $name }}</span>
                </p>
            </div>
        </div>
        <label for="name" class="dark:text-dark-400 mb-1 block text-sm font-semibold text-gray-600">Nome</label>
        <div class="relative rounded-md shadow-sm">
            <div
                class="focus:ring-primary-600 focus-within:focus:ring-primary-600 focus-within:ring-primary-600 dark:focus-within:ring-primary-600 flex rounded-md ring-1 focus-within:ring-2 dark:ring-dark-600 dark:text-dark-300 text-gray-600 ring-gray-300 dark:bg-dark-800 bg-white">
                <p
                    class="w-full rounded-md bg-transparent py-1.5 sm:text-sm sm:leading-6 text-gray-800 dark:text-dark-300">
                    <span class="ml-2">{{ $price }}</span>
                </p>
            </div>
        </div>

        <label for="description" class="dark:text-dark-400 mb-1 block text-sm font-semibold text-gray-600">
            Descrição
        </label>
        <div class="relative rounded-md shadow-sm">
            <div class="flex rounded-md ring-1 ring-gray-300 dark:ring-dark-600 bg-white dark:bg-dark-800">
                <div
                    class="w-full rounded-md bg-transparent py-1.5 px-3 sm:text-sm sm:leading-6 text-gray-800 dark:text-dark-300 whitespace-pre-line">
                    {{ $description }}
                </div>
            </div>
        </div>
    </x-cards.card-section>
    <x-cards.card-section>
        <div class="flex items-center justify-between">
            <div>
                <x-zmd-button text="Voltar" color="gray" sm :href="route('plans.plans')"/>
                <x-zmd-button text="Editar" color="orange" sm wire:click="$dispatch('plans::edit', {id: '{{ $this->id }}'})"/>
                @if ($detailCount == 0)
                    <x-zmd-button text="Excluir" color="red" sm wire:click="$dispatch('plans::destroy', {id: '{{ $this->id }}'})"/>
                @endif
            </div>
        
            <x-zmd-button text="{{ __('Adicionar novo detalhe') }}" color="indigo" sm wire:click="$dispatch('plans::details::create', {planId: '{{ $this->id }}'})"/>
        </div>
    </x-cards.card-section>

    <livewire:plans.edit />
    <livewire:plans.destroy />

    <x-cards.card-section>
    <livewire:plans.details.index :plan="$plan" />
    </x-cards.card-section>

    <livewire:plans.details.create :plan="$plan" />
    <livewire:plans.details.edit :plan="$plan" />
    <livewire:plans.details.destroy :plan="$plan" />
</x-cards.card>
