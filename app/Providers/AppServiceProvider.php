<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         User::observe(UserObserver::class);
         
        RateLimiter::for('custome-limit',function(Request $request){
            return Limit::perMinute(3)->by($request->ip())->response(function(){
                return response()->json(['message' => "plz waite, you can try after 1 minutes "],429);
            });
        });

    //    RateLimiter::for('custome-limit',function(Request $request){
    //     return Limit::perMinute(3)->by($request->ip())->response(function(){
    //         return response()->json(['message' => "try again after 5 minutes"],429);
    //     });
    //    });
    }
}
