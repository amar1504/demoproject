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
use App\Mail\Mailtrap;
use App\OrderDetails;
use Mail;
use App\Http\Requests\OrderStatus; 

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
        $contactList=ContactUs::OrderBy('id','desc')->paginate(5);
        return view('admin/contactlist',['contactList'=>$contactList]);
    }

    /**
     * function to show particular contact us data
     */
    public function contactUsShow($id){
        $contact=ContactUs::findOrFail($id);
        return view('admin/contactusshow',['contact'=>$contact]);
    }

    /**
     * function for view of contact us reply to customer
     */
    public function contactUsReply($id){
        $contact=ContactUs::findOrFail($id);
        return view('admin/contactusreply',['contact'=>$contact]);
    }
    
    /**
     * function for contact us reply to customer
     */
    public function contactUsReplyUpdate(Request $request){
        //dd($request->all());
        $validatedData=$request->validate([
            'reply'=>'required',
            ]);
        $contact=ContactUs::where('id', $request->contact_id)->update(['reply'=>$request->reply]);
        if($contact){
            $id=$request->contact_id;
            $contactus=ContactUs::findOrFail($id)->first();
            $contactUsData['name']=$contactus->name;
            $contactUsData['subject']=$contactus->subject;
            $contactUsData['email']=$contactus->email;
            $contactUsData['message']=$contactus->message;
            $contactUsData['reply']=$request->reply;
            $contactUsData['flag']='contact us for user';
            Mail::to($contactUsData['email'])->send(new Mailtrap($contactUsData));
            return redirect()->route('contactus.list')->with('flash_message','Reply Sent!');
             
        }
            
       
    }

    /**
     * function to display orders of logged user
     */
    public function customerOrdersList(){
        $orders=Order::with('Orders')
                    ->orderBy('id','desc')
                    ->paginate(5);
        //dd($orders);
        return view('admin.myorder',['orders'=>$orders]);
    }

    /**
     * function to show all details of the respective order 
     */
    public function customerOrderDetails($id){
        $orders=Order::with('Orders','OrderDetails','Addresses')
                    ->where('id','=',$id)
                    ->get();
        //dd($orders);
        return view('admin.myorderdetails',['orders'=>$orders]);

    }

    /**
     * function to load  change status view
     */
    public function changeStatus($id){
        $orders=Order::with('Orders','OrderDetails')->where('id','=',$id)->first();
        //dd($orders);
        return view('admin.changestatus',['orders'=>$orders]);
    }

    /**
     * function to update order status
     */
    public function updateStatus(OrderStatus $request){
        $updateStatus=OrderDetails::where('order_id','=',$request->order_id)->update(['status'=>$request->status]);
        $order=OrderDetails::where('order_id','=',$request->order_id)->first();
        $user=User::where('id','=',$order->user_id)->first();
        //dd($user);
        $statusData['flag']='status for user';
        $statusData['order_id']=$request->order_id;
        $statusData['status']=$request->status;
        $statusData['payment_mode']=$order->payment_mode;
        if($updateStatus){
            Mail::to($user->email)->send(new Mailtrap($statusData));
            return redirect()->route('order.list')->with('flash_message','Status Updated !');
        }
    }   

}
