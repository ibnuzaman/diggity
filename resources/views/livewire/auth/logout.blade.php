<?php

use Illuminate\Support\Facades\Auth;

class LogoutComponent extends \Livewire\Component
{
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function render()
    {
        return view('livewire.logout-component');
    }
}
