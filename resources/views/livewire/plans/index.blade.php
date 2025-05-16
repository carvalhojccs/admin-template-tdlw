<x-zmd-table :headers="$this->headers" :rows="$this->rows" filter paginate id="plans">
    @interact('column_action', $row) 
            <x-zmd-button.circle color="gray" flat sm icon="eye" :href="route('plans.show', $row->id)" />
    @endinteract
</x-zmd-table>