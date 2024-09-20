<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\VisitorController;
use App\Http\Middleware\LogVisitor;
use App\Http\Middleware\TrackVisitors;
use App\Models\Tracker;
use App\Models\Visitor;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Livewire\Volt\Volt;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/auth/google/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/google/callback', [ProviderController::class, 'callback']);




// Route::middleware(['visitors'])->group(function () {
//     Route::get('/weeklyVisitors', [VisitorController::class, 'weeklyVisitors']);
//     Route::get('/dailyVisitors', [VisitorController::class, 'dailyVisitor']);
// });



// Route::middleware(['visitors'])->group(function () {

Volt::route('/', 'pages.home.home')->name('home');
Volt::route('/contactus', 'pages.contactus.contact-us')->name('contact-us');
Volt::route('/project-based', 'pages.collaborationtype.project-based')->name('project-based');
Volt::route('/dedicated-team', 'pages.collaborationtype.dedicated-team')->name('dedicated-team');
Volt::route('/on-demand', 'pages.collaborationtype.on-demand')->name('on-demand');
Volt::route('/portfolio', 'pages.portfolio.portfolio')->name('portfolio');
Volt::route('/portfolio/{id}', 'pages.portfolio.detail-portfolio')->name('detail-portfolio');
Volt::route('/service', 'pages.services.service')->name('service');
Volt::route('/service/{id}', 'pages.services.service-detail')->name('service-detail');
// });

require __DIR__ . '/auth.php';
