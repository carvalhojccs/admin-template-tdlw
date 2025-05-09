<div>
    <x-zmd-modal title="Editar usuário" wire persistent center>
        <form wire:submit='handle' id="edit-user-form">
            <x-zmd-input label="Name *" hint="Insira o nome do usuário" wire:model='name' />
            <x-zmd-input label="E-mail *" hint="Insira o email do usuário" wire:model='email' type="email" />
        </form>
        <x-slot:footer>
            <x-zmd-button type="submit" text="Cancelar" color="secondary" sm wire:click="$set('modal', false)"/>
            <x-zmd-button form="edit-user-form" type="submit" text="Salvar" color="orange" sm/>
        </x-slot:footer>
    </x-zmd-modal>
</div>
