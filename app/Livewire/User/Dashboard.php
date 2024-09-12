<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\UserDetail;
use App\Models\Company;

class Dashboard extends Component
{
    public $userId;
    public $userInfo;
    public $fullName;

    public $firstName;
    public $middleName;
    public $lastName;
    public $companyName;
    public $ratePerHr;

    public function mount()
    {
        $this->userId = auth()->user()->id;
        $this->userInfo = UserDetail::where('user_id', $this->userId)->first();
        $this->fullName = $this->userInfo->first_name . ' ' . $this->userInfo->middle_name . ' ' . $this->userInfo->last_name;
    }

    public function render()
    {
        return view('pages.user.dashboard.main')->extends('layouts.users');
    }

    public function completeProfile()
    {
        $this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'companyName' => 'required',
            'ratePerHr' => 'required|numeric|gt:0',
        ], [
            'firstName.required' => 'First name is required',
            'lastName.required' => 'Last name is required',
            'companyName.required' => 'Company name is required',
            'ratePerHr.required' => 'Rate per hour is required',
            'ratePerHr.gt' => 'Rate per hour cannot be zero'
        ]);

        do {
            $employeeId = substr(date('y'), -2) . '-' . substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3) . substr(str_shuffle('0123456789'), 0, 2);
        } while (UserDetail::where('employee_id', $employeeId)->exists());

        UserDetail::create([
            'user_id' => $this->userId,
            'employee_id' => (string) $employeeId, // cast to string
            'first_name' => ucwords(strtolower($this->firstName)),
            'middle_name' => ucwords(strtolower($this->middleName)),
            'last_name' => ucwords(strtolower($this->lastName)),
        ]);

        Company::create([
            'user_id' => $this->userId,
            'company_name' => ucwords(strtolower($this->companyName)),
            'rate_per_hr' => $this->ratePerHr
        ]);

        $this->dispatch('success', ['message' => 'Profile completed successfully', 'redirect' => route('user.dashboard')]);

    }
}
