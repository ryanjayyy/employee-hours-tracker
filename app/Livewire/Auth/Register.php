<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class Register extends Component
{

    public $email;
    public $password;
    public $password_confirmation;
    public function render()
    {
        return view('pages.auth.register')->extends('layouts.guest');
    }

    public function register()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Email is not valid',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
            'password.confirmed' => 'Password does not match',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number and one special character',
        ]);

        User::create([
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'unhash_password' => $this->password,
        ]);

        $this->dispatch('success', ['message' => 'Yaay! You have successfully registered.', 'redirect' => route('auth.login')]);
    }
}
