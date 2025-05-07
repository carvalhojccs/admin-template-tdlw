@props([
    'title' => null,
    'segment' => null, // Ex: "usuarios", "admin/usuarios", "relatorios/vendas"
    'route' => null,
])

@php
    $isActive = Request::is($segment . '*');
@endphp

<li @class([
    'pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r',
    'from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' => $isActive,
])>
    <a
        href="{{ $route }}"
        @class([
            'block text-gray-800 dark:text-gray-100 truncate transition',
            'hover:text-gray-900 dark:hover:text-white' => !$isActive,
        ])
    >
        <div class="flex items-center justify-between">
            <div class="grow flex items-center">
                <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                    {{ $title }}
                </span>
            </div>
        </div>
    </a>
</li>
