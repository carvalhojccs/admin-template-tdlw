<x-zmd-modal title="Cadastrar novo plano" wire persistent center  x-on:open="$focusOn('name')">
    <form wire:submit='handle' id="create-plan-form">
        <x-zmd-input
            label="Nome *"
            hint="Insira o nome do plano"
            wire:model='name'
            x-ref="name"
            x-on:keydown.enter.prevent="$refs.price.focus()"
        />

        <x-zmd-input
            label="Preço *"
            hint="Insira o valor do plano"
            wire:model='price'
            type="text"
            x-mask:dynamic="$money($input, ',')"
            x-ref="price"
            x-on:keydown.enter.prevent="$refs.textarea.focus()"
        />

        <x-zmd-textarea
            label="Descrição"
            hint="Insira uma descrição para o plano"
            wire:model='description'
            maxlength="200"
            count
        />

    </form>
    <x-slot:footer>
    <x-zmd-button type="submit" text="Cancelar" color="secondary" sm wire:click="close"/>
    <x-zmd-button form="create-plan-form" type="submit" text="Salvar" color="orange" sm/>
    </x-slot:footer>
</x-zmd-modal>