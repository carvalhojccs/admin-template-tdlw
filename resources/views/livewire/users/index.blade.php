    <x-zmd-table :headers="$this->headers" :rows="$this->rows" filter paginate id="users">
        @interact('column_action', $row) 
            <x-zmd-button.circle color="gray" flat sm icon="pencil"
                wire:click="$dispatch('users::edit', {id: '{{ $row->id }}'})" />
        @endinteract
    </x-zmd-table>
