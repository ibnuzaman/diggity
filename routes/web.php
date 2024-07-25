<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Volt::route('/', 'pages.home.home')->name('home');
Volt::route('/contactus/1', 'pages.contactus.contact-us')->name('contact-us');
Volt::route('/contactus/2', 'pages.contactus.contact-us-2')->name('contact-us-2');
Volt::route('/contactus/3', 'pages.contactus.contact-us-3')->name('contact-us-3');

require __DIR__ . '/auth.php';
