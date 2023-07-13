<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\UserLoginActivity;

class LogUserLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    
    public function handle(UserLoggedIn $event)
    {
        $user = $event->user;

        $loginActivity = new UserLoginActivity();
        $loginActivity->user_id = $user->id;
        $loginActivity->login_time = now();
        $loginActivity->save();
    }
}
