<x-zmd-modal title="Aviso!" wire persistent center>
    <p>O usuário <span class="font-bold">{{ $name }}</span> será deletado. </p>
    <p class="text-sm text-gray-500">Essa operação é irreversível!</p>


    <x-slot:footer>
    <x-zmd-button type="submit" text="Cancelar" color="secondary" sm wire:click="$set('modal', false)"/>
    <x-zmd-button type="button" text="Deletar" color="rose" sm wire:click='handle' loading/>
    </x-slot:footer>
</x-zmd-modal>
