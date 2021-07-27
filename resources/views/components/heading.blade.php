@props([
	'tag' => 'h2',
	'size' => '2xl'
])

@php
$headingSize = [
	'4xl' => 'text-4xl',
	'3xl' => 'text-3xl',
	'2xl' => 'text-2xl',
	'xl' => 'text-xl',
	'lg' => 'text-lg',
	'md' => 'text-md',
][$size];
@endphp

<{{ $tag }} {!! $attributes->merge(['class' => 'text-gray-800 font-semibold tracking-tight ' . $headingSize]) !!}>{{ $slot }}</{{ $tag }}>
