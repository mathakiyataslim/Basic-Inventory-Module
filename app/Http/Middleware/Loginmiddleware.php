<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User; 


class Loginmiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
       
      
        if (!Auth::check()) {
            return redirect()->route('login');
        }

    //    $route = $request->route()->getName();
         
    //     $user = Auth::user();
    //     if($user->role === 'admin'){
    //         //  dd($request->route()->getName());
    //         return $next($request);
    //     }
      
    //    if($user->role ==='user'){
    //         if ($user->hasPermissionTo($route)) { 
    //             return $$next($request);
    //          }
    //    }

        return $next($request);
    }
}