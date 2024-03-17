<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
        public $email = "";
        public $password = "";
        public $remember = false;

    public function handleLogin()
    {
        $this->validate([
            'email' => ' required | email',
            'password' => ' required | string | regex:/^[a-zA-Z0-9@$#^%&*!]+$/u',
        ]);
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password,], $this->remember))
            return redirect()->to('/dashboard');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
