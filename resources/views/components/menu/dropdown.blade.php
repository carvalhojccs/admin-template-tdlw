@props([
    'title' => null,
    'segments' => [],
])

<li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r @if (in_array(Request::segment(1), $segments)) {{ 'from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' }} @endif"
    x-data="{ open: {{ in_array(Request::segment(1), $segments) ? 1 : 0 }} }">
    <a class="block text-gray-800 dark:text-gray-100 truncate transition @if (!in_array(Request::segment(1), $segments)) {{ 'hover:text-gray-900 dark:hover:text-white' }} @endif"
        href="#0" @click.prevent="open = !open; sidebarExpanded = true">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                {{-- <svg class="shrink-0 fill-current @if (in_array(Request::segment(1), $segments)) {{ 'text-violet-500' }}@else{{ 'text-gray-400 dark:text-gray-500' }} @endif"
                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                    <path
                        d="M9 6.855A3.502 3.502 0 0 0 8 0a3.5 3.5 0 0 0-1 6.855v1.656L5.534 9.65a3.5 3.5 0 1 0 1.229 1.578L8 10.267l1.238.962a3.5 3.5 0 1 0 1.229-1.578L9 8.511V6.855ZM6.5 3.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm4.803 8.095c.005-.005.01-.01.013-.016l.012-.016a1.5 1.5 0 1 1-.025.032ZM3.5 11c.474 0 .897.22 1.171.563l.013.016.013.017A1.5 1.5 0 1 1 3.5 11Z" />
                </svg> --}}
                <span
                    class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">{{ $title }}</span>
            </div>
            <!-- Icon -->
            <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-gray-400 dark:text-gray-500 @if (in_array(Request::segment(1), $segments)) {{ 'rotate-180' }} @endif"
                    :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                    <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                </svg>
            </div>
        </div>
    </a>
    <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
        <ul class="pl-8 mt-1 @if (!in_array(Request::segment(1), $segments)) {{ 'hidden' }} @endif"
            :class="open ? 'block!' : 'hidden'">
            {{ $slot }}
        </ul>
    </div>
</li>
