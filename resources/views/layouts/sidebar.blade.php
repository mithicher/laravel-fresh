@auth
	<x-sidebar>
		<x-slot name="logo">
			<x-application-logo class="h-10" />
		</x-slot>

		<x-nav-item to="{{ route('dashboard') }}" class="flex items-center py-2 text-gray-100">
			<x-iconic-home class="mr-4 stroke-current text-gray-300 w-6 h-6"/>Home
		</x-nav-item>

		<x-nav-item to="{{ route('users') }}" class="flex items-center py-2 text-gray-100">
			<x-iconic-user class="mr-4 stroke-current text-gray-300 w-6 h-6"/>Users
		</x-nav-item>

		<x-nav-item to="{{ route('roles') }}" class="flex items-center py-2 text-gray-100">
			<x-iconic-lock class="mr-4 stroke-current text-gray-300 w-6 h-6"/>Roles
		</x-nav-item>

		<x-nav-item to="{{ route('events.create') }}" class="flex items-center py-2 text-gray-100">
			<x-iconic-calendar class="mr-4 stroke-current text-gray-300 w-6 h-6"/>Events
		</x-nav-item>

		<div class="my-3"></div>

		<x-slot name="footer">
			<div class="px-4 py-2">
				<a href="{{ route('profile') }}" class="flex px-2 py-2 hover:bg-gray-700 rounded-lg {{ request()->is('profile') ? 'bg-gray-700' : '' }}">
					<livewire:profile-button />
				</a>
				<x-nav-item to="#" class="flex items-center mt-1 py-2 text-gray-100" onclick="event.preventDefault(); document.getElementById('js-sidebar-logout').submit()">
					<x-iconic-log-out class="mr-4 stroke-current text-gray-300 w-6 h-6"/>Log out
				</x-nav-item>
				<form method="POST" action="{{ route('logout') }}" id="js-sidebar-logout">
					@csrf
				</form>
			</div>
		</x-slot>
	</x-sidebar>
@endauth
