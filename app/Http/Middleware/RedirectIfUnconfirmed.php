<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Helpers\SendsAlerts;

class RedirectIfUnconfirmed
{
    use SendsAlerts;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->isUnconfirmed()) {
            $this->error('errors.unconfirmed');

            return redirect('/');
        }

        return $next($request);
    }
}
