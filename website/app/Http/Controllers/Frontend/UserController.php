<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        // Apply auth middleware only to actions that require authentication
        $this->middleware('auth');
    }

    // Method to show the user's profile page
    public function showProfile()
    {
        $user = Auth::user();
        return view('content.user.profile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = Auth::user();
        $user->update($request->only('name', 'email'));

        return redirect()->route('user.profile')->with('success', 'Cập nhật thông tin thành công.');
    }

    // Method to show the address page
    public function showAddress()
    {
        $user = Auth::user();
        $userInfo = $user->info;
        return view('content.user.address', ['userInfo' => $userInfo]);
    }

    // Method to update the user's address
    public function updateAddress(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
        ]);

        $user = Auth::user();

        // Update or create user info
        UserInfo::updateOrCreate(
            ['user_id' => $user->id],
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
            ]
        );

        return redirect()->route('user.address')->with('success', 'Cập nhật địa chỉ thành công.');
    }

    // Method to change password
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Check if current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.profile')->with('success', 'Đổi mật khẩu thành công.');
    }
}
