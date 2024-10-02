<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class RegisteredController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        try {
            $user = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            return response()->json([
                'status' => 'berhasil daftar',
                'data' => $user
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'gagal daftar',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
