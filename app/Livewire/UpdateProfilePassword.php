<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UpdateProfilePassword extends Component
{

    public $currentPassword;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'currentPassword' => 'required',
        'password' => 'required|min:8|confirmed',
    ];


    public $success = false;

    public function mount(){
       
    }

    public function render()
    {
        return view('livewire.update-profile-password');
    }

     public function updatePassword()
    {
        $this->validate();

        $user = Auth::user();

        if (!Hash::check($this->currentPassword, $user->password)) {
            $this->addError('currentPassword', 'Current password is incorrect.');
            return;
        }
         // Hash the new password before updating
        $newPasswordHashed = Hash::make($this->password);


        auth()->user()->update([
            'password' => $newPasswordHashed,
        ]);

        $this->resetFields();

        $this->success = true;
    }

    private function resetFields()
    {
        $this->currentPassword = '';
        $this->password = '';
        $this->confirmPassword = '';
    }
}
