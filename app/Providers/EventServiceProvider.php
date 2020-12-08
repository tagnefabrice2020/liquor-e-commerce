<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
        'App\Events\NewUser' => [
            'App\Listeners\EmailNewUser',
        ],
        'App\Events\SendEmailReset' => [
            'App\Listeners\EmailPasswordReset',
        ],
        'App\Events\NewOrder' => [
            'App\Listeners\EmailOrder',
        ],
        'App\Events\DeliveryConfirmation' => [
            'App\Listeners\SendDeliveryConfirmation',
        ],
        'App\Events\Invoice' => [
            'App\Listeners\InvoiceListener',
        ],
        'App\Events\DeliveryConfirmed' => [
        ],
        'App\Events\Notification' => [
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
