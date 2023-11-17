<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class UpdateProfilePicture extends Component
{
    use WithFileUploads;

    public $photo;
    public $success = false;

    public function render()
    {
        if(Auth::user()->profile_picture == 'user.png'){
            
            return view('livewire.update-profile-picture', [
                'currentPhoto' => '/photos/general/user.png',
            ]);
        }else{

        return view('livewire.update-profile-picture', [
                'currentPhoto' => '/photos/general/'.Auth::user()->profile_picture ]);
        }
        
    }

    public function updateProfilePicture()
    {
        $this->validate([
            'photo' => 'image|max:2048', // Adjust the validation rules as needed
        ]);

        if ($this->photo) {
            // Delete the old profile picture if it exists
            if (Auth::user()->profile_picture !== 'user.png') {
                $path = public_path() . '/photos/general/' .Auth::user()->profile_picture;
                File::delete($path);
            }

            // Generate a unique name for the uploaded file using time() function
            $fileName = Str::uuid() . '.' . $this->photo->extension();

            $this->photo->storeAs('photos/general', $fileName, 'real_public');

            // Update the user's profile picture in the database
            $user = Auth::user();
            $user->profile_picture = $fileName;
            $user->save();

           $this->success = true;
        }
    }
}
