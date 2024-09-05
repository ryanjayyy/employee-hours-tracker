<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class Login extends Component
{
    public $email;
    public $password;

    public function render()
    {
        return view('pages.auth.login')->extends('layouts.guest');
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $this->email)->first();

        if (!$user) {
            return $this->addError('login-status', 'Invalid email or password. Please try again.');
        }

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('user.dashboard');
        } else {
            return $this->addError('login-status', 'Invalid email or password. Please try again.');
        }
    }
}
