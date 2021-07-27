<div>
    <x-slot name="title">Users</x-slot>

    <x-slot name="topbar">
        <x-navbar-top>
            <x-slot name="title">
                <x-breadcrumb>
                    <x-breadcrumb-item>Users</x-breadcrumb-item>
                </x-breadcrumb>
            </x-slot>   
        
            <x-button tag="a" href="{{ route('users.create') }}" color="black">
                <x-iconic-plus class="stroke-current w-5 h-5 mr-1 -ml-2" />New User
            </x-button>   
        </x-navbar-top>
    </x-slot>

    <x-section-centered>
       
       @if($users->isNotEmpty()) 
            <x-card no-padding>
                <x-table.table>
                    <thead>
                        <tr>
                            <x-table.thead>Name</x-table.thead>
                            <x-table.thead>Email</x-table.thead>
                            <x-table.thead>Role</x-table.thead>
                            <x-table.thead>Created at</x-table.thead>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <x-table.tdata class="md:w-2/5">
                                    <a href="{{ route('users.edit', $user->id) }}" class="text-indigo-500 font-medium block truncate">
                                        {{ Str::title($user->name) }}
                                    </a>
                                </x-table.tdata>
                                <x-table.tdata>
                                    {{ $user->email }}
                                </x-table.tdata>
                                <x-table.tdata>
                                    {{ $user->roles()->pluck('name')->implode(',') }}
                                </x-table.tdata>
                                <x-table.tdata class="w-20">
                                    {{ $user->created_at->toFormattedDateString() }}
                                </x-table.tdata>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table.table>
            </x-card>
        @else 
            <x-card-empty />
        @endif
       
    </x-section-centered>
</div>
