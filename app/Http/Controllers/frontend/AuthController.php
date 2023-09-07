<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Models\User;
use Illuminate\Contracts\Session\Session;

class AuthController extends Controller
{
    public function login()
    {

        return view('frontend.auth.login');
    }

    public function authenticate(Request $request)
    {
        // return $request;
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 2) {

                return redirect()->route('frontend.index'); // Redirect to admin dashboard
            } else {
                return redirect()->back(); // Redirect to user checkout page
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }
    public function register()
    {
        return view('frontend.auth.register');
    }

    public function registerUser(Request $request)
    {

        $request->validate([
            'fname' => 'required|min:3|max:50',
            'lname' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users',

            'password' => 'required|min:6',
        ]);
        $user = new User();
        $user->name = $request->fname . ' ' . $request->lname;
        $user->email = $request->email;
        $user->role = 2;
        $user->password = bcrypt($request->password);
        $user->save();
        if ($user) {
            return redirect()->route('user.login')->with('success', 'User Created Successfully');
        }
    }
   
}
