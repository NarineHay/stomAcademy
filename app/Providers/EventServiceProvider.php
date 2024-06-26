<?php

namespace App\Providers;

use App\Models\BlogInfo;
use App\Models\Cart;
use App\Models\CourseInfo;
use App\Models\Order;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\WebinarInfo;
use App\Observers\BlogInfoObserver;
use App\Observers\CartObserver;
use App\Observers\CourseInfoObserver;
use App\Observers\OrderObserver;
use App\Observers\UserInfoObserver;
use App\Observers\UserObserver;
use App\Observers\WebinarInfoObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
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
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        WebinarInfo::observe(WebinarInfoObserver::class);
        CourseInfo::observe(CourseInfoObserver::class);
        BlogInfo::observe(BlogInfoObserver::class);
        UserInfo::observe(UserInfoObserver::class);
        Cart::observe(CartObserver::class);
        Order::observe(OrderObserver::class);

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
