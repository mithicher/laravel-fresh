@props([
	'withShadow' => true,
	'rounded' => true
])

<div class="overflow-x-auto border-b
	{{ $withShadow ? 'shadow-sm border-gray-50': 'border-gray-100' }}
	{{ $rounded ? 'rounded-lg': '' }}
">
    <table class="min-w-full bg-white
		{{ $rounded ? 'rounded-lg': '' }}
	">
		{{ $slot }}
	</table>
</div>
