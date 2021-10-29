<div>
    <x-slot name="title">New Event</x-slot>

    <x-slot name="topbar">
        <x-navbar-top>
            <x-slot name="title">
                <x-breadcrumb>
                    <x-breadcrumb-item href="{{ route('events.create') }}">Events</x-breadcrumb-item>
                    <x-breadcrumb-item>New Event</x-breadcrumb-item>
                </x-breadcrumb>
            </x-slot>
        </x-navbar-top>
    </x-slot>

    <x-section-centered>
        <x-card-form form-action="save">
            <x-slot name="title">Create New Event</x-slot>
            <x-slot name="description">Add a new event</x-slot>
 
            <x-input
                label="Event Name" 
                name="event_name"
                wire:model.defer="event_name" 
            />

            <x-input
                label="Event Venue" 
                name="event_venue"
                wire:model.defer="event_venue" 
            />
            
            <div class="md:w-48">
                <x-flatpicker
                    label="Event Date" 
                    name="event_date"
                    wire:model.defer="event_date" 
                    :options="[
                        'defaultDate' => null
                    ]"
                    placeholder="December 25, 2021"
                />
                
                <x-select label="Event Time" name="event_time" wire:model.defer="event_time" optional>
                    <option value="" disabled selected>Select a time</option>
                    <option value="9:00">9:00</option>
                    <option value="10:00">10:00</option>
                    <option value="11:00">11:00</option>
                    <option value="12:00">12:00</option>
                    <option value="1:00">13:00</option>
                    <option value="2:00">14:00</option>
                    <option value="3:00">15:00</option>
                </x-select>
            </div>

 
            <x-slot name="footer">
                <div class="mr-4">
                    <x-inline-toastr on="saved">Saved.</x-inline-toastr>
                </div>

                <x-button
                    color="black"
                    with-spinner
                    wire:target="save"
                >Save</x-button>
            </x-slot>
        </x-card-form>
       
    </x-section-centered>
</div>
