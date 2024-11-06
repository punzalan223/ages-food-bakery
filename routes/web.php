<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;


Volt::route('/', 'frontend.home')->name('home');
Volt::route('/login', 'frontend.login')->name('admin-login');

Route::middleware(['auth'])->group(function () {
    Volt::route('/dashboard', 'backend.dashboard')->name('admin-dashboard');
    Volt::route('/layout', 'backend.layout')->name('admin-layout');
    Volt::route('/inbox', 'backend.inbox')->name('admin-inbox');
    Volt::route('/profile', 'backend.profile')->name('admin-profile');
});