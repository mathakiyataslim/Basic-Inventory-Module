<?php

namespace App\Providers;

use App\Events\UserRegistered;
use App\Listeners\SendAdminNotification;
use App\Listeners\SendWecomeEmail;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
   protected $listen = [
    UserRegistered::class => [
        SendWecomeEmail::class,
        SendAdminNotification::class
    ],
   ];
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
