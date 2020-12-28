<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function showLoginForm()
    {
        return view('auth.login')->with([]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('mainGeneral');
    }

    public function redirectTo()
    {
        $role = auth()->user()->id_roles;
        switch ($role) {
            case '1':
                return '/admin';
                break;
            case '2':
                return '/taster';
                break;
            default:
                return '/';
                break;
        }
    }
}
