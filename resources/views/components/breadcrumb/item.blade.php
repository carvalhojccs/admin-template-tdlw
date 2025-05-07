<li>
    <div class="flex items-center">
        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
        </svg>
        @if (isset($route))
            <a href="{{ $route }}"
                class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                {{ $slot }}
            </a>
        @else
            <span class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400">
                {{ $slot }}
            </span>
        @endif
    </div>
</li>
