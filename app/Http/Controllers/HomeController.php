<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\User;
use App\Role;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCount=Product::get()->count();
        $role=Role::where('role_name','=','customer')->first();
        $userCount=User::where('roles','=',$role->id)->get()->count();
        // return view('master');

        return view('admin/home',['productCount'=>$productCount,'userCount'=>$userCount]);

    }
    
    
    
}
