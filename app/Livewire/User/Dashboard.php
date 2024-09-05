<?php

namespace App\Livewire\User;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('pages.user.dashboard.main')->extends('layouts.users');
    }
}
