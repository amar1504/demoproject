<?php

namespace App\Http\Controllers\Eshopper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;

use App\Category;
use App\Product;
use App\ProductImage;
use App\ProductCategory;
use App\Coupon;
use App\Address;
use App\Order;
use App\ProductOrder;
use App\OrderDetails;
use App\Role;
use App\User;
use Auth;
use App\Mail\Mailtrap;
use App\Mail\Mailorder;
use Mail;
class CartController extends Controller
{
    /**
     * function to show items in cart
     */
    public function index(){
        
        //return Cart::content().'<br/> total :'.Cart::total().' <br/> Tax: '.Cart::tax().'<br/> subtotal: '.Cart::subtotal().'<br/> count: '.Cart::count();
        return view('Eshopper.cart',['cartcontent'=>Cart::content(),'total'=>Cart::total(),'tax'=>Cart::tax(),'subtotal'=>Cart::subtotal(),'count'=>Cart::count()]);
    }

    /**
     * function to add item to cart
     */
    public function addItem($id){

        $productdetails=Product::with('ProductCategory','ProductCategory.Category','ProductImage')->where([['id','=',$id]])->orderBy('id','DESC')->first();        
        echo 'id '.$productdetails->id.' name '.$productdetails->product_name.' price '.$productdetails->price;
        $product_image=$productdetails->ProductImage->first()->product_image;
        //dd($productdetails);
        Cart::add($productdetails->id,$productdetails->product_name, 1, $productdetails->price,['product_image'=>$product_image]);

        return redirect('eshopper/cart');
    }

    /**
     * function to increase quantity
     */
    public function addQuantity(Request $request){

        $rowId=$request->id;
        $getproduct=Cart::get($rowId);
        Cart::update($rowId, $getproduct->qty+1); // This Will update the quantity
        $upitem=$getproduct=Cart::get($rowId);
        return response()->json(['qty'=>$upitem->qty,'itemsubtotal'=>$upitem->subtotal,'total'=>Cart::total(),'tax'=>Cart::tax(),'subtotal'=>Cart::subtotal()]);
        
    } 

     /**
     * function to decrease quantity
     */
    public function removeQuantity(Request $request){

        $rowId=$request->id;
        $getproduct=Cart::get($rowId);
        Cart::update($rowId, $getproduct->qty-1); // This Will update the quantity
        $upitem=$getproduct=Cart::get($rowId);
        return response()->json(['qty'=>$upitem->qty,'itemsubtotal'=>$upitem->subtotal,'total'=>Cart::total(),'tax'=>Cart::tax(),'subtotal'=>Cart::subtotal()]);
        
    } 

    /**
     * function to remove item from cart
     */
    public function removeItem($rowId){

        Cart::remove($rowId);
        return redirect('eshopper/cart');
    }

    /**
     * function to update item quantity
     */
    public function updateQty($rowId){
        //echo $rowId;
        $getproduct=Cart::get($rowId);
        $qty=$getproduct->qty ;
        Cart::update($rowId, $qty-1); // This Will update the quantity
        return redirect('eshopper/cart');
    }

    /**
     * function to calculate discount of coupon
     */
    public function coupon(Request $request){
        $coupon=Coupon::where('code','=',$request->code)->first();

        if($coupon->type=="1"){
            $discount=(Cart::total()*$coupon->discount)/100;
            $discount=number_format($discount,2);
        }
        else{
            $discount=$coupon->discount;
        }

        if(count($coupon)>=1){
            return response()->json(['couponid'=>$coupon->id, 'name'=>$request->code,'discount'=>$discount,'total'=>Cart::total()]);
        }
        else{
            return response()->json(['error_msg'=>'Invalid Coupon']);
        }

    }    

    /**
     * function for checkout cart item
     */
    public function checkout(Request $request){
        $couponDiscount=$request->coupondiscount;
        $user_id=Auth::user()->id;
        $addresses=Address::where('user_id','=',$user_id)->get();
        return view('Eshopper/checkout',['coupon_id'=>$request->coupon_id, 'addresses'=>$addresses,'cartcontent'=>Cart::content(),'total'=>Cart::total(),'tax'=>Cart::tax(),'subtotal'=>Cart::subtotal(),'count'=>Cart::count(),'couponDiscount'=>$couponDiscount]);
    }

    /**
     * function to store address if new , order details
     */
    public function storeOrder(Request $request){
       
        $r=$request->all();
        $billingaddressid=$request->billingaddressid."<br/>";
        $shippingaddressid=$request->shippingaddressid."<br/>";
        $billingaddress=Address::where('id','=',$billingaddressid)->first();
        $shippingaddress=Address::where('id','=',$shippingaddressid)->first();
        // echo "<br/><br/>".count($billingaddress);
        // echo "<br/><br/>".count($shippingaddress);

        if(count($billingaddress)<1){
            //echo "<br/>insert billing address";
            $requestData1['name']=$request->billingname;
            $requestData1['address1']=$request->billingaddress1;
            $requestData1['address2']=$request->billingaddress2;
            $requestData1['country']=$request->billingcountry;
            $requestData1['state']=$request->billingstate;
            $requestData1['city']=$request->billingcity;
            $requestData1['zipcode']=$request->billingzipcode;
            $requestData1['mobileno']=$request->billingmobileno;
            $requestData1['user_id']=Auth::user()->id;
            Address::create($requestData1);

            //dd($requestData1);  
        }
        if(count($shippingaddress)<1){
            //echo "<br/>insert shipping address";        
            $requestData2['name']=$request->shippingname;
            $requestData2['address1']=$request->shippingaddress1;
            $requestData2['address2']=$request->shippingaddress2;
            $requestData2['country']=$request->shippingcountry;
            $requestData2['state']=$request->shippingstate;
            $requestData2['city']=$request->shippingcity;
            $requestData2['zipcode']=$request->shippingzipcode;
            $requestData2['mobileno']=$request->shippingmobileno;
            $requestData2['user_id']=Auth::user()->id;
            Address::create($requestData2);

            //dd($requestData2);
        }
       

        //dd($r);
       
        if(Cart::total() >=500)
        {
            $shippingCharge=0;
        }else{
            $shippingCharge=50;
        }
        if($request->coupon_id==null)
        {
            $request->couponDiscount=0;
            $request->coupon_id=0;
        }
        $total=Cart::total()+$shippingCharge;

        $orderData['user_id']=Auth::user()->id;
        $orderData['address_id']=$request->shippingaddressid;
        $orderData['subtotal']=Cart::subtotal();
        $orderData['tax']=Cart::tax();
        $orderData['discount']=$request->couponDiscount;
        $orderData['total']=$total-$orderData['discount'];
        $orderData['shipping_charge']=$shippingCharge;
        $orderData['coupon_id']=$request->coupon_id;
        // echo $orderData['total'];
        // dd($orderData);
        $orderSubmit=Order::create($orderData);

        
        if($orderSubmit)
        {
            foreach(Cart::content() as $item)
            {   
                $order['order_id']=$orderSubmit->id;
                $order['user_id']=Auth::user()->id;
                $order['product_id']=$item->id;
                $order['name']=$item->name;
                $order['price']=$item->subtotal;
                $order['product_image']=$item->options->product_image;
                $order['quantity']=$item->qty;
                ProductOrder::create($order);
            }

            $orderdeatils['order_id']=$orderSubmit->id;
            $orderdeatils['user_id']=Auth::user()->id;
            $orderdeatils['transaction_id']=str_random(8,12);
            $orderdeatils['transaction_status']='pending';
            $orderdeatils['payment_mode']=$request->paymentMode;
            $orderdeatils['status']='pending';
            OrderDetails::create($orderdeatils);

            Cart::destroy();

            $orders=Order::with('Orders','OrderDetails','Addresses')
                    ->where('id','=',$orderSubmit->id)
                    ->first();
           
            
            $role=Role::where('role_name','=','superadmin')->first();
            $user=User::where('roles','=',$role->id)->first();
           // $orders['flag']='order mail for user';
            //dd($orders);
            Mail::to(Auth::user()->email)->send(new Mailorder($orders));
            Mail::to($user->email)->send(new Mailorder($orders));

           return view('Eshopper.ordersubmit');
        }
        

    }

}
