<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Role;

class CheckRoleMiddleware
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
        
        $roleId=Auth::user()->roles;
        $role=Role::findOrFail($roleId);
        if($role->role_name==="superadmin")
        {
            
            return $next($request);
        }
        else{
            return redirect()->route('home')->with('flash_message','you are not authorized person so you have limited access !');
        }
       
        // return $next($request);
    }
}
