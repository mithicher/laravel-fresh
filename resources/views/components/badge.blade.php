@props(['variant' => 'info'])

@php
$badgeClass = [
	'info' => 'bg-blue-100 text-blue-600',
	'success' => 'bg-green-100 text-green-600',
	'warning' => 'bg-yellow-100 text-yellow-600',
	'danger' => 'bg-red-100 text-red-600',
	'gray' => 'bg-gray-600 text-white'
];	
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center px-2 rounded-full uppercase text-xs leading-5 tracking-wide font-semibold '. $badgeClass[$variant]]) }}>
	{{ $slot }}
</span>