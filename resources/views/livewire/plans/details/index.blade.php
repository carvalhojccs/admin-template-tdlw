<div>
<table class="dark:divide-dark-500/50 min-w-full divide-y divide-gray-200">
  <thead class="uppercase bg-gray-50 dark:bg-dark-600">
    <tr>
      <th scope="col" class="dark:text-dark-200 px-3 py-3.5 text-left text-sm font-semibold text-gray-700">
        <a>#</a>
      </th>
      <th scope="col" class="dark:text-dark-200 px-3 py-3.5 text-left text-sm font-semibold text-gray-700">
        <a>Nome</a>
      </th>
      <th scope="col" class="dark:text-dark-200 px-3 py-3.5 text-left text-sm font-semibold text-gray-700">
        <a>Criado em</a>
      </th>
      <th scope="col" class="dark:text-dark-200 px-3 py-3.5 text-left text-sm font-semibold text-gray-700">
        <a>Atualizado em</a>
      </th>
      <th scope="col" class="dark:text-dark-200 px-3 py-3.5 text-left text-sm font-semibold text-gray-700">
        <a>Ação</a>
      </th>
    </tr>
  </thead>
  <tbody class="dark:bg-dark-700 dark:divide-dark-500/20 divide-y divide-gray-200 bg-white">
    @foreach ($details as $detail)
    <tr class="" wire:key="4d995f46c69a04c10b8e942e2922da0a">
      <td class="dark:text-dark-300 whitespace-nowrap px-3 py-4 text-sm text-gray-500">
        {{ $detail->id }}
      </td>
      <td class="dark:text-dark-300 whitespace-nowrap px-3 py-4 text-sm text-gray-500">
        {{ $detail->name }}
      </td>
      <td class="dark:text-dark-300 whitespace-nowrap px-3 py-4 text-sm text-gray-500">
        {{ $detail->created_at->format('d/m/Y H:i') }}
      </td>
      <td class="dark:text-dark-300 whitespace-nowrap px-3 py-4 text-sm text-gray-500">
        {{ $detail->updated_at->diffForHumans() }}
      </td>
      <td class="dark:text-dark-300 whitespace-nowrap px-3 py-4 text-sm text-gray-500">
        <x-zmd-button.circle color="gray" flat sm icon="pencil" wire:click="$dispatch('plans::details::edit', {detailId: '{{ $detail->id }}'})" />
        <x-zmd-button.circle color="red" flat sm icon="trash" wire:click="$dispatch('plans::details::destroy', {detailId: '{{ $detail->id }}'})" />
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
