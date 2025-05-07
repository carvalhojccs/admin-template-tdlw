<li class="mb-1 last:mb-0">
    <a class="block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate @if (Route::is('{{ $route }}')) {{ 'text-violet-500!' }} @endif"
        href="{{ $route }}">
        <span
            class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ $title }}</span>
    </a>
</li>
