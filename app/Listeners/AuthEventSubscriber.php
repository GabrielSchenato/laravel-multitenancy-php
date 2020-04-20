<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

class AuthEventSubscriber
{
    public function onLogin(Login $events)
    {
    }
    public function onLogout(Logout $events)
    {
    }
    public function subscribe($events)
    {
        $events->listen(
            Login::class,
            '\App\Listeners\AuthEventSubscriber@onLogin'
        );
        $events->listen(
            Logout::class,
            '\App\Listeners\AuthEventSubscriber@onLogout'
        );
    }
}
