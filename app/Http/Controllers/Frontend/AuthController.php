<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AuthRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function loginForm()
    {
        $categories = $this->getCategories();

        return view('frontend.auth.login', compact('categories'));
    }

    public function login(AuthRequest $req)
    {
        /* $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('loginForm')->with('error_message', 'Please check the information and try again.');
        } */

        $customer = Customer::where('email', $req->email)->first();

        if (!$customer) {
            return Redirect::to('/login')->withErrors(['error' => 'There is no email adress equal to your email adress.']);
        }

        if (!Hash::check($req->password, $customer->password)) {
            return Redirect::to('/login')->withErrors(['error' => 'Passwords don\'t match.']);
        }

        if (!$customer->is_active) {
            return Redirect::to('/login')->withErrors(['error' => 'Your account isn\'t active now. If you consider this as an error, you can just contact us.']);
        }

        session()->put('customer', $customer);
    }

    public function logout()
    {
        Auth::logout('user');
        return redirect()->route('loginForm');
    }

}
