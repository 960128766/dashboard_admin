<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        if (auth()->user()->email == 'hoseinbayati91@gmail.com') {
            return route('admin');
        }
        return '/home';
    }

    public function logout(Request $request)
    {
        if (auth()->user()->email == 'hoseinbayati91@gmail.com') {
            Auth::logout();
            return redirect()->route('login');
        }
        Auth::logout();
        return redirect()->route('website.main.page');
    }
}
