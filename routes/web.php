<?php


use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\User\Dashboard;
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->name('auth.')->middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});


Route::prefix('/user')->name('user.')->middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});
