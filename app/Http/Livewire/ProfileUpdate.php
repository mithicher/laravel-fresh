<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProfileUpdate extends Component
{
    use WithFileUploads;

    public $name;
    public $profileImage;
    public $profileImageUrl = null;

    public function updatedProfileImage() 
    {
        $this->validate([
            'profileImage' => [
                'required', 
                'mimes:jpeg,jpg,png', 
                'max:1024', 
                // 'dimensions:max_width=250,max_height=250'
            ]
        ]);
    }

    public function mount() 
    {
        $this->name = auth()->user()->name;
        $this->profileImage = auth()->user()->photo;
        $this->profileImageUrl = auth()->user()->photo_url ?? null;
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => ['required']
        ]);

        auth()->user()->update([
            'name' => $this->name
        ]);

        // Upload Profile Image of Customer/User if it's not String
        // If File Object
        if (! is_string($this->profileImage) && ! is_null($this->profileImage)) {
            auth()->user()->update([
                'photo' => $this->profileImage->store('/', 'public')
            ]);

            // Repopulate with new image path
            $this->profileImageUrl = auth()->user()->photo_url;
        }

        // Refetch updated data.
        $this->name = auth()->user()->name;

        $this->notify('Profile updated.', 'success');

        $this->emit('profileButtonRefresh');
        $this->emitSelf('saved');
        $this->emitSelf('$refresh');
    }

    public function removeImage() 
    {
        $storagePath = Storage::disk('public')->path(auth()->user()->photo);
        
        if (file_exists($storagePath)) {
            Storage::disk('public')->delete(auth()->user()->photo);

            auth()->user()->update([
                'photo' => null
            ]);
        }

        $this->profileImageUrl = null;  
        $this->profileImage = null;  
        $this->emit('profileButtonRefresh');
        $this->emit('$refresh');
    }

    public function render()
    {
        return view('livewire.profile-update');
    }
}
