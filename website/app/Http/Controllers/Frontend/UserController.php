<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Method to show the user's profile page
    public function showProfile()
    {
        $user = Auth::user();
        return view('content.user.profile', [ 'user' => $user ]); // Ensure you have resources/views/profile.blade.php
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = Auth::user();
        $user->update($request->only('name', 'email'));

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
    }

    // Method to show the address page
    public function showAddress()
    {
        return view('content.user.address'); // Ensure you have resources/views/address.blade.php
    }
}
