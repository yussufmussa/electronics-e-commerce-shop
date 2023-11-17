<?php

namespace App\Livewire;

use Livewire\Component;

class UpdateProfileInfo extends Component
{

    public $name;
    public $email;
    public $success = false;

    public function mount(){

        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        

    }

    public function render()
    {
        return view('livewire.update-profile-info');
    }

    public function updateProfile(){

        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',

        ]);
        auth()->user()->update([
            'name' => $this->name,
            'email' => $this->email

        ]);
        $this->success = true;

    }
}
