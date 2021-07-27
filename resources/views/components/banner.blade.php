@props(['style' => session('flash.bannerStyle', 'success'), 'message' => session('flash.banner')])

<div x-data="{{ json_encode(['show' => true, 'style' => $style, 'message' => $message]) }}"
    :class="{ 'bg-green-100 border-green-200 mb-4': style == 'success', 'bg-red-100 border-red-200 mb-4': style == 'danger' }"
    class="rounded-lg border"
    style="display: none;"
    x-show="show && message"
    x-init="
        document.addEventListener('banner-message', event => {
            style = event.detail.style;
            message = event.detail.message;
            show = true;
        });
    ">
    <div class="max-w-screen-xl mx-auto py-2 pl-3 pr-4">
        <div class="flex items-center justify-between flex-wrap">
            <div class="w-0 flex-1 flex items-center min-w-0">
                {{-- Danger Icon --}}
                <template x-if="style == 'danger'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                </template>

                {{-- Success Icon --}}
                <template x-if="style == 'success'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                </template>

                <p class="ml-3 font-medium truncate text-gray-800" x-text="message"></p>
            </div>

            <div class="flex-shrink-0 sm:ml-3">
                <button
                    type="button"
                    class="-mr-1 flex p-2 rounded-md focus:outline-none sm:-mr-2 transition ease-in-out duration-150 group"
                    :class="{ 'text-green-600 hover:bg-green-500 focus:bg-green-500 focus:text-white hover:text-white': style == 'success', 'text-red-600 hover:bg-red-500 focus:bg-red-500 focus:text-white hover:text-white': style == 'danger' }"
                    aria-label="Dismiss"
                    x-on:click="show = false">
                    <svg class="h-5 w-5 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
