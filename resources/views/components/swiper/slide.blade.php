<div class="{{ $backgroundPosition ?? 'bg-center' }} relative swiper-slide bg-cover shadow-lg" style="background-image: url('{{ $imageUrl }}');" {{ $attributes }}>
	<div class="bg-gradient-to-b from-transparent via-transparent to-gray-800 absolute inset-0"></div>
	{{-- <div class="bg-gradient-to-b from-transparent to-gray-800 absolute inset-0"></div> --}}

    <div class="container mx-auto px-6 md:px-20 py-6 {{ $height ?? 'h-72 md:h-96' }}">
        <div class="w-full md:w-1/2 flex items-end h-full">
        	@if($slot->isEmpty())
	            <div class="py-10 px-6 relative">
	            	@isset($title)
	                	<h2 class="text-white font-bold leading-tight text-2xl md:text-5xl tracking-tight">{{ $title  }}</h2>
	                @endisset

	                @isset($description)
	                	<p class="text-gray-100 md:text-xl mt-2 md:mt-6 font-light">{{ $description }}</p>
	                @endisset

	                @isset($action)
	                	<div class="mt-6">
	                		{{ $action }}
	                	</div>
	                @endisset
	            </div>
            @else
            	{{ $slot }}
            @endif
        </div>
    </div>
</div>
 
