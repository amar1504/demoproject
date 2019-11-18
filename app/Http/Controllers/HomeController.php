<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\User;
use App\Role;
use App\Order;
use App\Coupon;
use App\ContactUs;


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
        $orderCount=Order::get()->count();
        $couponCount=Coupon::get()->count();
        // return view('master');

        return view('admin/home',['productCount'=>$productCount,'userCount'=>$userCount,'orderCount'=>$orderCount,'couponCount'=>$couponCount]);

    }
    
    /**
     * function to show List of contact us
     */
    public function contactUsList(){
        $contactList=ContactUs::paginate(5);
        return view('admin/contactlist',['contactList'=>$contactList]);
    }

    /**
     * function to show particular contact us data
     */
    public function contactUsShow($id){
        $contact=ContactUs::findOrFail($id);
        return view('admin/contactusshow',['contact'=>$contact]);
    }
    
    
}
