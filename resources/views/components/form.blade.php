@props([
	'method' => 'POST',
	'action' => ''
])
 
<form 
	action="{{ $action }}" 
	method="{{ $method === 'GET' ? 'GET' : 'POST' }}"
	{{ $attributes }}
	onsubmit="event.submitter.disabled = true; event.submitter.classList.add('base-spinner', 'cursor-not-allowed', 'opacity-75')">
	@csrf

	@if (!in_array($method, ['GET', 'POST']))
		@method($method)
	@endif

	{{ $slot }}
</form>