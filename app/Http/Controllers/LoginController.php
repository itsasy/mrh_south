<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

  //  use AuthenticatesUsers;
  public function index()
  {
    return view('login')->with([]);
  }

  public function login(Request $request)
  {
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
      Auth::logoutOtherDevices($request->password);

      if (Auth::user()->id_roles == 1) {
        session(['user' => Auth::user()]);
        return redirect()->route('mainAdmin');
      }

      if (Auth::user()->id_roles == 2) {
        session(['user' => Auth::user()]);
        return redirect()->route('mainTaster');
      }

      return redirect()->route('mainGeneral');
    }

    return redirect()->route('mainGeneral');
  }

  public function logout(Request $request)
  {
    Session::flush();
    Auth::logout();

    return redirect()->route('mainGeneral');
  }
}
