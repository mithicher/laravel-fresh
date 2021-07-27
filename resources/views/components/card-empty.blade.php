@props([
	'variant' => 'theme2',
	'icon' => null
])

<div {{ $attributes->merge(['class' => 'md:px-10 py-20 shadow rounded-lg bg-white']) }}>
	<div class="text-center flex justify-center flex-col w-full items-center">
		@if(isset($icon))
			<div class="bg-indigo-100 w-12 h-12 rounded-full py-2 flex justify-center items-center">
				@svg($icon, ['class' => 'w-6 h-6 stroke-current text-indigo-500'])
			</div>
		@else
			@if (isset($variant) && $variant === 'theme1')
			 	<div class="bg-indigo-100 block w-32 h-32 rounded-full py-2">
			 		<div class="w-32 bg-white p-2 rounded shadow my-2 transform -translate-x-6">
						<div class="h-2 w-2/3 rounded-lg bg-indigo-100"></div>
					</div>	

					<div class="w-32 bg-white p-2 rounded shadow mb-2 transform translate-x-6">
						<div class="h-2 w-4/5 rounded-lg bg-indigo-300"></div>
					</div>	

					<div class="w-32 bg-white p-2 rounded shadow my-2 transform -translate-x-6">
						<div class="h-2 w-2/3 rounded-lg bg-indigo-100"></div>
					</div>	
			 	</div>
		 	@endif

		 	@if (isset($variant) && $variant === 'theme2')
			 	<div class="bg-indigo-100 w-32 h-32 rounded-full flex items-end overflow-hidden">
			 		<div class="w-24 mx-auto bg-white px-2 pb-4 pt-3 rounded shadow-sm -mb-2">
						<div class="h-2 w-2/3 mb-2 rounded-lg bg-indigo-100"></div>
						<div class="h-2 w-full mb-2 rounded-lg bg-indigo-300"></div>
						<div class="h-2 w-2/3 mb-2 rounded-lg bg-indigo-100"></div>
						<div class="h-2 w-3/4 mb-2 rounded-lg bg-indigo-300"></div>
					</div>
			 	</div>
		 	@endif

		 	@if (isset($variant) && $variant === 'theme3')
			 	<div class="relative mb-6">
			 		<div class="w-32 h-32 bg-indigo-100 rounded-full absolute top-0 bottom-0 right-0 left-0 z-10 -mt-6 block"></div>
				 	<div class="bg-white w-32 px-3 py-3 rounded-lg shadow mb-2 transform translate-x-6 relative z-20">
						<div class="h-2 w-2/3 mb-2 rounded-lg bg-indigo-200"></div>
						<div class="h-2 w-full rounded-lg bg-indigo-100"></div>
					</div>

					<div class="bg-white w-32 px-3 py-3 rounded-lg shadow -mt-6 transform -translate-x-6 relative z-20"> 
						<div class="h-2 w-2/3 mb-2 rounded-lg bg-gray-100"></div>
						<div class="h-2 w-full rounded-lg bg-indigo-300"></div>
					</div>
			 	</div>
		 	@endif 
		@endif
		 
		<div class="text-gray-500 mt-4">
			{{ $slot->isEmpty() ? 'No data found.' : $slot }}
		</div>
	</div>	
</div>
