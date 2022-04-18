<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserAuthenticated
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
 
        if( Auth::check() )
        {
            $user = Auth::user();

            if ( $user->hasRole('admin') ) {
                return redirect(route('index'));
            }
            else if ( $user->hasRole('user') ) {
                return $next($request);
            }
        }
        abort(403); 
    }
}
