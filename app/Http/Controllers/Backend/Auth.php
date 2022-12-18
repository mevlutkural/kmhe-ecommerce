<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as AuthUser;
use Illuminate\Support\Facades\Session;

class Auth extends Controller
{
    public function loginForm()
    {
        return view('backend.auth.login');
    }

    public function login(LoginRequest $req)
    {
        $credentials = $req->only('email', 'password');
        if (AuthUser::attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('loginForm')->with('error_message', 'Please check the information and try again.');
        }
    }

    public function logout()
    {
        AuthUser::logout('user');
        return redirect()->route('loginForm');
    }
}
