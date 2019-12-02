<?php

namespace App\Http\Middleware;
use Illuminate\Session\Store;
use Closure;
use Auth;
use Cookie;
use App\Role;
use App\User;

class SessionTimeoutMiddleware
{
   
    protected $session;
    

    public function __construct(Store $session){
       
        $this->session = $session;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      
       if(!Auth::user()){
            $userId=Cookie::get('user_id');
            $user=User::whereId($userId)->first();
            $role=Role::findOrFail($user->roles);
            if($role->role_name=="customer"){
                return redirect()->route('userlogin')->with('info','session has been expired, please log in again !');
            }
            else{
                return redirect()->route('login')->with('info','session has been expired, please log in again !');
            }
       }
        return $next($request);
    }

}
