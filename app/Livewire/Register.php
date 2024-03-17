<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{

        public $name = "";
        public $username = "";
        public $email = "";
        public $password = "";
        public $password_confirmation = "";
    public function mount()
    {

    }
    public function handleRegister()
    {
        $this->validate([
            'email' => 'required | email | unique:users,email',
            'username' => 'required | min:8 | unique:users,username',
            'password' => 'required |string | min:8 | confirmed',
        ]);
        $user = new User;
        $user->name = $this->name;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        $user->save();
        Auth::login($user);
        return redirect()->to('/dashboard');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
