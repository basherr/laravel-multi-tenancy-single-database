<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
use App\Role;

class BuilderMiddleware
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
        $role = new Role;
        $roles = $role->get_admin_roles();
        $roles = array_column( $roles, 'id');
        $site_id = Session::get('site');

        foreach(Auth::user()->roles as $role)
        {
            //Check if the current user role is builder
            if($role->pivot->site_id == $site_id && in_array($role->pivot->role_id, $roles)) {

                return $next($request);
                
            }
        }

        abort('403');
    }
}
