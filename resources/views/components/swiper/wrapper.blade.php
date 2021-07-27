<div 
    class="swiper-container w-full" 
    x-ref="swiperContainer"
    x-data="{
        swiper: null
    }"
    x-init="
        swiper = new Swiper ($refs.swiperContainer, {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            autoplay: {
                delay: 6000
            },

            // swiper-slider-not-working-unless-page-is-resized
            observer: true, 
            observeParents: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
                {{-- type: 'progressbar', --}}
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        })
    "
    x-cloak
>
    <div class="swiper-wrapper">
    	{{ $slot }}
    </div>

    {{-- Navigation Buttons --}}
    <div class="hidden md:flex">
        <div class="swiper-button-prev w-16 h-16 text-xs" style="color: rgba(255, 255, 255, 0.5)"></div>
        <div class="swiper-button-next w-16 h-16 text-xs" style="color: rgba(255, 255, 255, 0.5)"></div>
    </div>

    {{-- Pagination --}}
    <div class="swiper-pagination"></div>
</div>
 

@once
@push('scripts')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endpush
@endonce
