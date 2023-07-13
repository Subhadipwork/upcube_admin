<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class AdminAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('admin.login');
    }

    /**
     * Determine if the user is authenticated as an admin.
     *
     * @param \Illuminate\Http\Request $request
     * @param array $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard('admin')->check()) {
            $user = $this->auth->guard('admin')->user();

            if ($user->role === 1) {
                return $this->auth->shouldUse('admin');
            }
        }

        $this->unauthenticated($request, $guards);
    }
}
