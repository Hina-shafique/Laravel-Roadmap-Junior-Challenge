@props(['active'])

@php
    $classes = ($active ?? false)
        ? 'inline-flex items-center px-1 pt-1 text-sm font-bold leading-5 text-indigo-600'
        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>