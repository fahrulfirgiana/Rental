<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;

class UserController extends Controller
{
  public function index()
  {
    return view('login', ['title' => 'login']);
  }
  public function authenticate(Request $request)
  {
    $credential = $request->validate([
      'email' => ['required', 'email:dns'],
      'password' => ['required']
    ]);
    if (Auth::attempt($credential)) {
      $request->session()->regenerate();
      return redirect()->intended('welcome');
    }
    return back()->with('loginError', 'Login Failed');
  }
  public function logout(Request $request)
  {
    Auth::logout();
    request()->session()->invalidate();
    return redirect('/login');
  }
}
