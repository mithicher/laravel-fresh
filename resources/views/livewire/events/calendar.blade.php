<div>
	{{-- Calendar --}}
    <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
        <div class="bg-white rounded-lg shadow overflow-hidden">

            <div class="flex items-center justify-between py-2 px-3">
                <div>
                    <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                    <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                </div>
                <div class="border rounded-lg px-px leading-none py-px">
                    <button 
                        type="button"
                        class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 items-center"
                        x-on:click="month--; getNoOfDays(); $wire.getCurrentMonthEvents(month, year)">
                        <svg class="h-5 w-5 text-gray-400 inline-flex leading-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>  
                    </button>
                    <div class="border-r inline-flex h-5"></div>		
                    <button 
                        type="button"
                        class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-100 p-1"
                        x-on:click="month++; getNoOfDays(); $wire.getCurrentMonthEvents(month, year)">
                        <svg class="h-5 w-5 text-gray-400 inline-flex leading-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>									  
                    </button>
                </div>
            </div>	

            <div class="-mx-1 -mb-1">
                <div class="flex flex-wrap">
                    <template x-for="(day, index) in DAYS" :key="index">	
                        <div style="width: 14.26%" class="px-2 py-2">
                            <div
                                x-text="day" 
                                class="text-gray-500 text-xs uppercase tracking-wide font-bold text-center"></div>
                        </div>
                    </template>
                </div>

                <div class="flex flex-wrap border-t border-l">
                    <template x-for="(blankday, blankdayIndex) in blankdays">
                        <div 
                            style="width: 14.28%; height: 48px;"
                            class="text-center border-b border-r px-4 pt-2"
                        ></div>
                    </template>	
                    <template x-for="(date, dateIndex) in numberOfDays" :key="dateIndex">	
                        <div style="width: 14.28%; height: 48px;" class="p-1 text-center border-r border-b relative">
                            
                            <div
                                x-on:click="alert(date)"
                                x-text="date"
                                class="inline-flex w-6 h-6 text-sm items-center justify-center cursor-pointer text-center leading-none rounded-full transition ease-in-out duration-100"
                                :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }"	
                            ></div>

                            {{-- Event Dots --}}
                            <div class="mt-px flex space-x-0.5 justify-center absolute left-0 right-0 bottom-2">
                                <template x-for="event in events.filter(e => new Date(e.event_date).toDateString() ===  new Date(year, month, date).toDateString() )">
                                    <div class="flex-shrink-0 w-1.5 h-1.5 rounded-full overflow-hidden mx-auto bg-red-500"></div>
                                </template>
                            </div>
                            {{-- ./Event Dots --}}

                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

	{{-- Current Month Events --}}
    <div class="flex items-center justify-between mt-6 mb-2">
        <x-heading size="lg">Upcoming Events</x-heading>
        <a href="#" class="text-indigo-600 text-sm font-semibold hover:underline">View All</a>
    </div>

    <div class="space-y-2">
        @forelse($currentEvents as $event)
            <a href="#" class="no-underline block hover:opacity-75">
                <x-alertbox class="text-sm">
                    <div class="-my-2">
                        <strong class="block mb-1.5">{{ $event->event_name }}</strong>
                        {{-- 12 hour format with uppercase AM/PM --}}
                        <span class="text-gray-500 block">@date($event->event_date) {{ $event->event_time != '00:00:00' ? 'at ' . date('g:i A', strtotime($event->event_time)) : '' }}</span>
                        <span class="text-gray-500">{{ $event->event_venue }}</span>
                    </div>
                </x-alertbox>
            </a>
        @empty
            <x-card-empty>No events</x-card-empty>
        @endforelse
    </div>
     
    @push('scripts')
    <script>
		const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

		function app() {
			return {
				month: '',
				year: '',
				numberOfDays: [],
				blankdays: [],
				days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

				events: @json($events),

				event_title: '',
				event_date: '',
				event_theme: 'blue',

				openEventModal: false,

				initDate() {
					let today = new Date();
					this.month = today.getMonth();
					this.year = today.getFullYear();
					this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
				},

				isToday(date) {
					const today = new Date();
					const d = new Date(this.year, this.month, date);

					return today.toDateString() === d.toDateString() ? true : false;
				},

				showEventModal(date) {
					// open the modal
					this.openEventModal = true;
					this.event_date = new Date(this.year, this.month, date).toDateString();
				},

				addEvent() {
					if (this.event_title == '') {
						return;
					}

					this.events.push({
						event_date: this.event_date,
						event_title: this.event_title,
						event_theme: this.event_theme
					});

					console.log(this.events);

					// clear the form data
					this.event_title = '';
					this.event_date = '';
					this.event_theme = 'blue';

					//close the modal
					this.openEventModal = false;
				},

				getNoOfDays() {
                    if (this.month > 11) {
                        this.year++;
                        this.month = 0;
                    }

                    if (this.month < 0) {
                        this.year--;
                        this.month = 11;
                    }

					let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

					// find where to start calendar day of week
					let dayOfWeek = new Date(this.year, this.month).getDay();
					let blankdaysArray = [];
					for ( var i=1; i <= dayOfWeek; i++) {
						blankdaysArray.push(i);
					}

					let daysArray = [];
					for ( var i=1; i <= daysInMonth; i++) {
						daysArray.push(i);
					}
					
					this.blankdays = blankdaysArray;
					this.numberOfDays = daysArray;
				}
			}
		}
	</script>
    @endpush
</div>
