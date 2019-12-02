<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Cookie\CookieJar;
use Auth;
use Cookie;
use App\Role;
use App\User;
use Socialite;

use Exception;

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

    /**
     * function for logout
     */
    public function logout(Request $request)
    {
        $roleId=auth()->user()->roles; 
        $role=Role::findOrFail($roleId);
        Auth::logout();
        if ($role->role_name == 'customer') {
            $request->session()->flush();
            return redirect()->route('userlogin')->with('info','You have been logged out.');
        }
        else{
            $request->session()->flush();
            return redirect('login')->with('info','You have been logged out.');
        }
    }

    /**
     * function to redirect as per role of logged user
     */
    public function redirectTo() 
    {
        Cookie::queue(Cookie::make('user_id', Auth::user()->id));
        //dd($cookie);
        $roleId=auth()->user()->roles; 
        $role=Role::findOrFail($roleId);
        //echo $role->role_name;  //dd($role);
        if ($role->role_name == 'superadmin') {
            return('/home');
        }elseif($role->role_name == 'admin') {
            return('/home');
        }elseif($role->role_name == 'inventory_manager') {
            return('/home');
        }elseif($role->role_name == 'order_manager') {
            return('/home');
        }elseif($role->role_name == 'customer'){
            return('/eshopper');
        }    
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return  redirect('/eshopper');   
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id
                ]);
                Auth::login($newUser);
                return  redirect('/eshopper');   
            }
  
        } catch (Exception $e) {
            return redirect('auth/google');
        }
    }

}
