<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();

            if ($user->role === 1) {
                return redirect(route('admin.dashboard')); // Redirect to the desired route for authenticated admin users
            }
        }

        return $next($request);
    }
}
