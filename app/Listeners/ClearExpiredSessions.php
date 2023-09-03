<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClearExpiredSessions
{
    // use InteractsWithQueue;

    // /**
    //  * Handle the event.
    //  *
    //  * @param  Logout  $event
    //  * @return void
    //  */
    // public function handle(Logout $event)
    // {
    //     Auth::logout();
    // }
}
