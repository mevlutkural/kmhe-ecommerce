<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('backend.auth.login');
    }

    public function login(AuthRequest $req)
    {
        $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('loginForm')->with('error_message', 'Please check the information and try again.');
        }
    }

    public function logout()
    {
        Auth::logout('user');
        return redirect()->route('loginForm');
    }
}
