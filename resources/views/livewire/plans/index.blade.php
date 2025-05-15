<x-zmd-table :headers="$this->headers" :rows="$this->rows" filter paginate id="plans">
    @interact('column_action', $row) 
        <x-zmd-button.circle color="gray" flat sm icon="pencil" wire:click="$dispatch('plans::edit', {id: '{{ $row->id }}'})" />
            <x-zmd-button.circle color="gray" flat sm icon="eye" :href="route('plans.show', $row->id)" />
        @if (Auth::id() !== $row->id)
            <x-zmd-button.circle color="red" flat sm icon="trash" wire:click="$dispatch('plans::destroy', {id: '{{ $row->id }}'})" />
        @endif
    @endinteract
</x-zmd-table>