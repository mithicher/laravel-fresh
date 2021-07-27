@props([
	'href' => '',
	'separator' => '&#47;'
])

 
@if ($href)
	<a class="hover:underline text-indigo-500 hover:text-indigo-600" href="{{ $href }}">
		{{ $slot }}
	</a>
 
	<span class="text-gray-400">{!! $separator !!}</span> 
@else 
	<span class="text-gray-700">
		{{ $slot }}
	</span>
@endif
