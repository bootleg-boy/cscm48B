<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    /*public function handle($request, Closure $next)
    {
        return $next($request);
    }*/

    public function handle($request, Closure $next)
    {

        if( Auth::check() )
        {
            $user = Auth::user();
            // if user is not admin take him to his dashboard
            if ( $user->hasRole('user') ) {
                return redirect(route('index'));
            }

            // allow admin to proceed with request
            else if ( $user->hasRole('admin') ) {
                return $next($request);
            }
        }

        abort(403); 
    }
}
