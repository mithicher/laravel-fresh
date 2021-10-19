<div class="shadow-sm bg-white relative z-10">
	<x-section-centered>
		<div class="flex flex-1 items-center h-16">
			@isset($action)
				<div class="mr-3">
					{{ $action}}
				</div>
			@endisset
			
			<div class="flex flex-1 items-center justify-between">
				<h2 class="font-semibold text-gray-800 text-xl">
					{{ $title }}
				</h2>
	
				<div>
					{{ $slot }}
				</div>
			</div>
		</div>
	</x-section-centered>
</div>
