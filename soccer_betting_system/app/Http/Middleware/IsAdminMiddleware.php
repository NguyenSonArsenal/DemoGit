<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if ( Auth::check() ) {

            $user = Auth::user();

            //dd($user);

            if($user->role_id == '1') {
                return $next($request);
                //return redirect()->route('admin');
            } else {
                return redirect()->route('login');
            }

        } else {
            return redirect()->route('login');
        }


    }
}
