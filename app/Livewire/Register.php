<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{

    public $data = [
        "name" => "",
        "username" => "",
        "email" => "",
        "password" => "",
        "password_confirmation" => "",
        "agree-term" => false
    ];
    public function mount()
    {

    }
    public function handleRegister()
    {
        $this->validate([
            'data.email' => 'required | email | unique:users,email',
            'data.username' => 'required | min:8 | unique:users,username',
            'data.password' => 'required |string | min:8 | confirmed',
            'data.agree-term' => 'required',
        ]);
        $user = new User;
        $user->name = $this->data['name'];
        $user->username = $this->data['username'];
        $user->email = $this->data['email'];
        $user->password = bcrypt($this->data['password']);
        $user->save();
        Auth::login($user);
        return redirect()->to('/dashboard');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
