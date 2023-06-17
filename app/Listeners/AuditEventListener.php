<?php

namespace App\Listeners;

use App\Events\AuditEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class AuditEventListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(AuditEvent $event)
    {
        // return $event ;
        // \Log::info("User name : {$event->user}, Date : ".date('H:i:s d-m-Y'));
        DB::table('audits')->insert([
            'user_name' => $event->user,
            'table_name' => $event->tablename,
            'event_type' => $event->eventtype,
            'data' => $event->data,
            'date' => date('Y-m-d H:i:s'),
        ]);
    }
}
