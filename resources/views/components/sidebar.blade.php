<div 
	x-data="{ open: false }" 
	x-cloak @opensidebar.window="open = true">
	
	{{-- Overlay --}}
	<div x-on:click="open = false" class="md:hidden fixed inset-0 z-30 bg-gray-600 opacity-0 pointer-events-none transition-opacity ease-linear duration-300" :class="{'opacity-75 pointer-events-auto': open, 'opacity-0 pointer-events-none': !open}" x-cloak></div>

	<div class="fixed h-full inset-y-0 left-0 flex flex-col z-40 max-w-xs w-full lg:w-64 bg-gray-800 transform ease-in-out duration-300 -translate-x-full lg:translate-x-0" :class="{'translate-x-0': open, '-translate-x-full': !open}">
		
		{{-- Brand/Logo --}}
		<div class="flex items-center px-6 py-2 h-16 bg-gray-900">
			{{ $logo }}
		</div>

		<div class="px-4 py-3 flex-1 h-0 overflow-y-auto">
			{{ $slot }}
		</div>

		<div class="mt-auto">
			{{ $footer }}
		</div>
	</div>
</div>
