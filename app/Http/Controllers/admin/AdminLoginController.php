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

    // public function authenticate(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     $validator = Validator::make($credentials, [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     if (Auth::guard('admin')->attempt($credentials)) {
    //         // Authentication successful
    //         return redirect()->route('admin.dashboard');
    //     }

    //     // Authentication failed
    //     return redirect()->back()->withErrors(['error' => 'Invalid credentials'])->withInput();
    // }
    // public function authenticate(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
    
    //     $validator = Validator::make($credentials, [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);
    
    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput($request->only('email'));
    //     }
    
    //     if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
    //         // Authentication successful
    //         $user = Auth::guard('admin')->user();
    //         // dd($user);
    //         // var_dump($user->role);
    //         // die();
    //         if ($user->role == 1) {
    //             // User has role 1, redirect to the dashboard
    //             return redirect()->route('admin.dashboard');
    //         }
    //          else {
    //             // User does not have role 1, show error message
    //             // Auth::guard('admin')->logout();
    //             return redirect()->back()->withErrors(['error' => 'You do not have access to the dashboard']);
    //         }
    //     }
    
    //     // Authentication failed
    //     return redirect()->back()->withErrors(['error' => 'Invalid credentials'])->withInput($request->only('email'));
    // }
    public function authenticate(Request $request)
{
    $credentials = $request->only('email', 'password');

    $validator = Validator::make($credentials, [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput($request->only('email'));
    }

    // Add the 'remember' option to the Auth::guard('admin')->attempt() method
    $remember = $request->has('remember');
    if (Auth::guard('admin')->attempt($credentials, $remember)) {
        // Authentication successful
        $user = Auth::guard('admin')->user();
        if ($user->role == 1) {
            // User has role 1, redirect to the dashboard
            return redirect()->route('admin.dashboard');
        } else {
            // User does not have role 1, show error message
            return redirect()->back()->withErrors(['error' => 'You do not have access to the dashboard']);
        }
    }

    // Authentication failed
    return redirect()->back()->withErrors(['error' => 'Invalid credentials'])->withInput($request->only('email'));
}

    protected function authenticated(Request $request, $user)
    {
        event(new UserLoggedIn($user));
    }


}
