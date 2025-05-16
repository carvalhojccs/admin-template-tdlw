<x-zmd-modal title="{{ __('Cadastrar novo detalhe do plano') }}" wire persistent center  x-on:open="$focusOn('name')">
    <form wire:submit='handle' id="create-plan-detail-form">
        <x-zmd-input
            label="Nome *"
            hint="Descreva o detalhe do plano"
            wire:model='name'
        />
    </form>
    <x-slot:footer>
    <x-zmd-button type="submit" text="Cancelar" color="secondary" sm wire:click="close"/>
    <x-zmd-button form="create-plan-detail-form" type="submit" text="Salvar" color="orange" sm/>
    </x-slot:footer>
</x-zmd-modal>