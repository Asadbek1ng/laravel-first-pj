<?php

namespace App\Http\Listeners;

use App\Http\Events\LoginEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class LoginEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Http\Events\LoginEvent  $event
     * @return void
     */
    public function handle(LoginEvent $event)
    {
        DB::table('logins')->insert([
            'user_name' => $event->user,
            'login_date' => date('Y-m-d H:i:s')
        ]);

    }
}
