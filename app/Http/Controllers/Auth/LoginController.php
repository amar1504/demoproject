<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Role;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        return view('auth.login');
    }

    public function redirectTo() 
    {
        $roleId=auth()->user()->roles; 
        $role=Role::findOrFail($roleId);
        echo $role->role_name;  //dd($role);
        if ($role->role_name == 'superadmin') {
            return('/home');
        }elseif($role->role_name == 'admin') {
            return('/home');
        }elseif($role->role_name == 'inventory_manager') {
            return('/home');
        }elseif($role->role_name == 'order_manager') {
            return('/home');
        }else{
            return('/Eshopper/home');
        }
    }

    
}
