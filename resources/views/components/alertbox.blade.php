
@props(['variant' => 'info'])

@php
$alertClass = [
	'info' => 'bg-gradient-to-b from-blue-500 to-white',
	'success' => 'bg-gradient-to-b from-green-500 to-white',
	'error' => 'bg-gradient-to-b from-red-500 to-white',
	'warning' => 'bg-gradient-to-b from-yellow-500 to-white'
];
$alertTextClass = [
	'info' => 'text-blue-700',
	'success' => 'text-green-700',
	'error' => 'text-red-700',
	'warning' => 'text-yellow-700'
];
@endphp
 
<div
	{{
		$attributes->merge([
			"class" => "w-full relative pl-8 pr-4 py-4 rounded-lg bg-white shadow flex w-full"
		])
	}}
	role="alert">
	
	<div class="top-0 left-0 absolute w-2 h-full py-2 pl-2">
		<div class="rounded w-2 h-full flex-1 {{ $alertClass[$variant] }}"></div>
	</div>
	
	<div class="flex-1 {{ $alertTextClass[$variant] }} pt-1">
		{{ $slot }}
	</div>
</div>
 
