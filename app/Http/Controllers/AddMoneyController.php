<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
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
use App\CMS;
use Auth;
use App\Mail\Mailtrap;
use App\Mail\Mailorder;
use Mail;

class AddMoneyController extends HomeController
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // parent::__construct();
        
        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    /**
     * Show the application paywith paypalpage.
     *
     * @return \Illuminate\Http\Response
     */
    public function payWithPaypal()
    {
        return view('paywithpaypal');
    }
    /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithpaypal(Request $request)
    {   
        $r=$request->all();
        
        $billingaddressid=$request->billingaddressid."<br/>";
        $shippingaddressid=$request->shippingaddressid."<br/>";
        $billingaddress=Address::where('id','=',$billingaddressid)->first();
        $shippingaddress=Address::where('id','=',$shippingaddressid)->first();
        // echo "<br/><br/>".count($billingaddress);
        // echo "<br/><br/>".count($shippingaddress);
        if(count($billingaddress)<1){
            dd(count($billingaddress));

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
            if($request->coupon_id >=1){
                $coupon=Coupon::whereId($request->coupon_id)->first();
                Coupon::whereId($request->coupon_id)->update(['quantity'=>$coupon->quantity-1]);
            }

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

        }
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name **/
            ->setCurrency('INR')
            ->setQuantity(1)
            ->setPrice($orderData['subtotal']); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('INR')
            ->setTotal($orderData['total']);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status')) /** Specify return URL **/
            ->setCancelUrl(URL::route('payment.status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
            /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('addmoney.paywithpaypal');
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('addmoney.paywithpaypal');
                /** die('Some error occur, sorry for inconvenient'); **/
            }
        }
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if(isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error','Unknown error occurred');
        return Redirect::route('addmoney.paywithpaypal');
    }
    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error','Payment failed');
            return Redirect::route('addmoney.paywithpaypal');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        $cms=CMS::where('type','=','footer')->get();
        if ($result->getState() == 'approved') { 
            
            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/
            \Session::put('success payment','Payment success');
            return Redirect::route('Eshopper.ordersubmit');
        }
        \Session::put('error','Payment failed');
        return Redirect::route('Eshopper.ordersubmit');
    }
  }