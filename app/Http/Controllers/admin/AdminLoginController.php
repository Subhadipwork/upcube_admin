<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\UserLoggedIn;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{   
    

    public function index()
    {
        return view('admin.login');
    }


public function authenticate(Request $request)
{
    $credentials = $request->only('email', 'password');

    $validator = Validator::make($credentials, [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput($request->only('email'));
    }

    $remember = $request->has('remember');
    if (Auth::guard('admin')->attempt($credentials, $remember)) {
        $user = Auth::guard('admin')->user();
        if ($user->role == 1) {
            return redirect()
                ->route('admin.dashboard');
        } else {
            return redirect()
                ->back()
                ->withErrors(['error' => 'You do not have access to the dashboard']);
        }
    }

    return redirect()
        ->back()
        ->withErrors(['error' => 'Invalid credentials'])
        ->withInput($request->only('email'));
}

    public function redirect(){
        return redirect()->route('admin.login');
    }

    protected function authenticated(Request $request, $user)
    {
        event(new UserLoggedIn($user));
    }



}
