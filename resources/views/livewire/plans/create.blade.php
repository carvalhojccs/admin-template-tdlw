<div>
    <x-zmd-modal title="Cadastrar novo plano" wire persistent center>
        <form wire:submit='handle' id="create-plan-form">
            <x-zmd-input label="Nome *" hint="Insira o nome do plano" wire:model='name' />
            <x-zmd-input label="Preço *" hint="Insira o valor do plano" wire:model='price' type="text" />
            
            <x-zmd-textarea label="Descrição" hint="Insira uma descrição para o plano" wire:model='description' maxlength="200" count />

        </form>
        <x-slot:footer>
        <x-zmd-button type="submit" text="Cancelar" color="secondary" sm wire:click="$set('modal', false)"/>
        <x-zmd-button form="create-plan-form" type="submit" text="Salvar" color="orange" sm/>
        </x-slot:footer>
    </x-zmd-modal>
</div>
