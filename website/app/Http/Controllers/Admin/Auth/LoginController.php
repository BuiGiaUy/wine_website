<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected string $redirectTo = RouteServiceProvider::ADMIN_HOME;


    public function showLoginForm(): Factory|View|Application
    {
        return view("auth.admin.login");
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
    public function logout(Request $request): Application|Redirector|RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login.form');
    }
}
