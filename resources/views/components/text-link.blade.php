@php
$themes = [
	'indigo' => 'text-indigo-600 hover:text-indigo-700',
	'red' => 'text-red-600 hover:text-red-700',
	'green' => 'text-green-600 hover:text-green-700',
][$color ?? 'indigo'];
@endphp

<a 
	href="{{ $href }}"
	{{ $attributes->merge([
		"class" => "hover:underline " . $themes
	]) }}
>{{ $slot }}</a>
