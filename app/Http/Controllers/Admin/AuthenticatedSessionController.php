<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{

    public function index()
    {
        return response()->json(['status' => 'Test Admin']);
    }

    public function store(Request $request)
    {
        $result = $request->all();
        if (!$request->hasSession()) {
            $request->setLaravelSession(app('session.store'));
        }

        if (Auth::guard('admin')->attempt(['email' => $result['email'], 'password' => $result['password']])) {
            $request->session()->regenerate();
            return response()->json(['status' => 'Admin logged in']);
        } else {
            return response()->json(['status' => 'error']);
        }
        return response()->json(['status' => 'not authorized']);
    }

    public function dashboard()
    {
        return response()->json(['status' => 'Admin dashboard']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['status' => 'Admin logged out']);
    }
}
