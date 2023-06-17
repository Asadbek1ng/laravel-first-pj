<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use App\Http\Events\LoginEvent;
use App\Http\Listeners\LoginEventListener;
use App\Events\LogoutEvent;
use App\Listeners\LogoutEventListener;
use App\Events\AuditEvent;
use App\Listeners\AuditEventListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        // Registered::class => [
        //     SendEmailVerificationNotification::class,
        // ],

        LoginEvent::class => [
            LoginEventListener::class,
        ],

        LogoutEvent::class => [
            LogoutEventListener::class,
        ],

        AuditEvent::class => [
            AuditEventListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
