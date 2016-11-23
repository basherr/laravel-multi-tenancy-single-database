<?php

namespace App\Http\Middleware;

use Session;
use Closure;

class SiteResolver
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
        if(!Session::get('site')) {
            $sites = \Auth::user()->sites;
            //Redirect to the sitelist 
            // if(count($sites) > 1) {

            //     return redirect()->to('sites/list');

            // }

            Session::put('site', $sites->first()->id);
        }
        return $next($request);
    }
}
