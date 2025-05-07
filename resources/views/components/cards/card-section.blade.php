@props([
    'px' => 'px-5',
    'py' => 'py-3',
])

<div {{ $attributes->merge([
    'class' => implode(' ', [
        $px,
        $py,
        'text-gray-700',
        'border border-gray-200',
        'rounded-lg',
        'bg-gray-50',
        'dark:bg-gray-800',
        'dark:border-gray-700',
        'justify-between',
        'items-center',
    ]),
]) }}>
    {{ $slot }}
</div>
