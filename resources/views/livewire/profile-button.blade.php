<div>
    <div class="flex">
        @if (is_null(auth()->user()->photo))
            <div class="flex-shrink-0 mr-4 flex items-center justify-center">
                <x-avatar name="{{ auth()->user()->name }}" size="36" />
            </div>
        @else
            <div class="w-8 h-8 rounded-full flex-shrink-0 mr-4 bg-indigo-700 relative overflow-hidden">
                <img 
                    src="{{ auth()->user()->photo_url }}" 
                    alt="{{ auth()->user()->name }}"
                    class="rounded-full absolute object-cover w-full h-full" 
                    loading="lazy"
                >
            </div>
        @endif
        <div>
            <div class="font-medium text-sm text-gray-300 leading-tight w-40 truncate">{{ auth()->user()->name ?? 'John Wick' }}</div>
            <div class="text-indigo-400 text-xs truncate leading-tight">
                View profile
            </div>
        </div>
    </div>
</div>
