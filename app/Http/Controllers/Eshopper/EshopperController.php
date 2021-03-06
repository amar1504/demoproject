<?php

namespace App\Http\Controllers\Eshopper;

use Illuminate\Http\Request;
use App\Http\Requests\TrackOrderValidation;
use App\Http\Requests\UserProfileValidation;
use App\Http\Requests\UpdatePasswordValidation;
use App\Http\Requests\ContactUsValidation;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\ProductImage;
use App\ProductCategory;
use App\Banner;
use App\Role;
use App\User;
use App\Order;
use App\OrderDetails;
use App\ContactUs;
use App\ProductOrder;
use App\CMS;
use App\Mail\Mailtrap;
use Auth;
use Mail;
use App\Wishlist;
use App\Coupon;
use Hash;
class EshopperController extends Controller
{
    /**
     * function to diplay products category, subcategory on index page
     */
    public function index(){
        $category=Category::with('subCategories')
                        ->where([['parent_id','=',0],['status','=','1']])
                        ->get();

        $banner=Banner::where([['status','=','1']])->take(3)->get();

        $product=Product::with('ProductCategory','ProductCategory.Category','ProductImage')
                        ->where([['status','=','1']])
                        ->orderBy('id','DESC');
        if(count($product) < 9)
        {
            $product=$product->get();
        }else{
            $product=$product->take(9)
            ->get();             
        }                
        
        $recommendedproduct=Product::with('ProductCategory','ProductCategory.Category','ProductImage')
                                    ->where([['status','=','1']])
                                    ->orderBy('id','DESC');
                                          
        if(count($recommendedproduct) < 9)
        {
            $recommendedproduct=$recommendedproduct->get();   
        }else{
            $recommendedproduct=$recommendedproduct->get()->random(9);          
        } 
        
        if(count($recommendedproduct) >= 3)
        {
            $recommendedproduct=$recommendedproduct=array_chunk($recommendedproduct->toArray(), 3);
  
        }
        else if(count($recommendedproduct) >=1){
            $recommendedproductCount=count($recommendedproduct);
            $recommendedproduct=$recommendedproduct=array_chunk($recommendedproduct->toArray(), $recommendedproductCount);
   
        }
        else{
            $recommendedproduct=Product::with('ProductCategory','ProductCategory.Category','ProductImage')
                                ->where([['status','=','1']])
                                ->orderBy('id','DESC')
                                ->get();
        }
       // dd($recommendedproduct);

        $randomsubcategory=Category::where([['parent_id','!=',0],['status','=','1']]);        
        if(count($randomsubcategory)< 7){
            $randomsubcategory=$randomsubcategory->get();
        }
        else{
            $randomsubcategory=$randomsubcategory->get()->random(7);
        }

        if(request()->dev==1){ dd($randomsubcategory->toArray()); }
        //dd($mencategory);
        $subcategorycount=Category::with('products')
                                    ->where([['parent_id','!=',0],['status','=','1']])
                                    ->get();        
        //dd($subcategorycount);
        $cms=CMS::where('type','=','footer')->get();

        return view('Eshopper/master',['category'=>$category,'banner'=>$banner,'product'=>$product,'randomsubcategory'=>$randomsubcategory,'recommendedproduct'=>$recommendedproduct,'subcategorycount'=>$subcategorycount ,'cms'=>$cms]);  
     }
    
     /**
      * function to show  features Item
      */
    public function featuresItem(Request $request){
        //dd($request->all());
        $id=$request->category_id;
        $product=ProductCategory::with('Product','ProductImages')
                                ->where('category_id','=',$id)
                                ->take(4)
                                ->get();   
        
        return response()->json(['name' => $id,'product'=>$product]);

    }

    /**
     * function for user login
     */
    public function userLogin(){
        $role=Role::where('role_name','=','customer')->first();
        $cms=CMS::where('type','=','footer')->get();
        return view('Eshopper/login',['role_id'=>$role->id,'cms'=>$cms]);
    }
    
    /**
     * function to display products of given category
     */
    public function product($id){
        $category=Category::with('subCategories')
                            ->where([['parent_id','=',0],['status','=','1']])
                            ->get();

        $product=ProductCategory::with('Product','ProductImages','Category')
                                ->where([['category_id','=',$id]])
                                ->orderBy('id','DESC')
                                ->get();        

        $givencategory=Category::where([['id','=',$id],['status','=','1']])->first();
        
        $recommendedproduct=Product::with('ProductCategory','ProductCategory.Category','ProductImage')
        ->where([['status','=','1']])
        ->orderBy('id','DESC');
              
        if(count($recommendedproduct) < 9)
        {
        $recommendedproduct=$recommendedproduct->get();   
        }else{
        $recommendedproduct=$recommendedproduct->get()->random(9);          
        } 

        if(count($recommendedproduct) >= 3)
        {
        $recommendedproduct=$recommendedproduct=array_chunk($recommendedproduct->toArray(), 3);

        }
        else if(count($recommendedproduct) >=1){
            $recommendedproductCount=count($recommendedproduct);
            $recommendedproduct=$recommendedproduct=array_chunk($recommendedproduct->toArray(), $recommendedproductCount);
   
        }
        else{
            $recommendedproduct=Product::with('ProductCategory','ProductCategory.Category','ProductImage')
                                ->where([['status','=','1']])
                                ->orderBy('id','DESC')
                                ->get();
        }
        // dd($recommendedproduct);

        $randomsubcategory=Category::where([['parent_id','!=',0],['status','=','1']]);        
        if(count($randomsubcategory)< 7){
        $randomsubcategory=$randomsubcategory->get();
        }
        else{
        $randomsubcategory=$randomsubcategory->get()->random(7);
        }
        
        $subcategorycount=Category::with('products')
                                    ->where([['parent_id','!=',0],['status','=','1']])
                                    ->get();        
        $cms=CMS::where('type','=','footer')->get();
        
        return view('Eshopper/product',['category'=>$category,'product'=>$product,'randomsubcategory'=>$randomsubcategory,'recommendedproduct'=>$recommendedproduct,'givencategory'=>$givencategory,'subcategorycount'=>$subcategorycount,'cms'=>$cms]);  

    }
    
    /**
     * function for the forgot password view
     */
    public function forgotPasswordview()
    {
        $cms=CMS::where('type','=','footer')->get();
        return view('Eshopper/forgotpassword',['cms'=>$cms]);
    } 

    /**
     * function to store and send new password
     */
    public function forgotpassword(Request $request)
    {
        //echo $request->email; 
        $user=User::with('userRole')->where('email','=',$request->email)->first();
        
        if(count($user) >= 1 && $user->userRole->role_name=="customer")
        {
            $password=str_random(8,12);
            $data=array(
                'email'=>$request->email,
                'password'=> $password
            );
            $data['flag']='forgot password';
            Mail::to($request->email)->send(new Mailtrap($data));
    
            $updatePassword=User::where('email','=',$request->email)
                                ->update(['password'=>bcrypt($password)]);

            return redirect('eshopper/forgotpassword')->with('flash_message', 'We will shortly notify you by mail. Thank You -Eshopper !');
        }else{
            return redirect('eshopper/forgotpassword')->with('flash_message', 'Email doesnot exist !');

        }
    }

    /**
     * function to display product details
     */
    public function productDetails($id){
        $category=Category::with('subCategories')
                            ->where([['parent_id','=',0],['status','=','1']])
                            ->get();
                            
        $givencategory=Category::where([['id','=',$id],['status','=','1']])->first();
        
        // dd($givencategory);     

        $recommendedproduct=Product::with('ProductCategory','ProductCategory.Category','ProductImage')
        ->where([['status','=','1']])
        ->orderBy('id','DESC');
              
        if(count($recommendedproduct) < 9)
        {
        $recommendedproduct=$recommendedproduct->get();   
        }else{
        $recommendedproduct=$recommendedproduct->get()->random(9);          
        } 

        if(count($recommendedproduct) >= 3)
        {
        $recommendedproduct=$recommendedproduct=array_chunk($recommendedproduct->toArray(), 3);

        } else if(count($recommendedproduct) >=1){
            $recommendedproductCount=count($recommendedproduct);
            $recommendedproduct=$recommendedproduct=array_chunk($recommendedproduct->toArray(), $recommendedproductCount);
   
        }
        else{
            $recommendedproduct=Product::with('ProductCategory','ProductCategory.Category','ProductImage')
                                ->where([['status','=','1']])
                                ->orderBy('id','DESC')
                                ->get();
        }
        // dd($recommendedproduct);

        $randomsubcategory=Category::where([['parent_id','!=',0],['status','=','1']]);        
        if(count($randomsubcategory)< 7){
        $randomsubcategory=$randomsubcategory->get();
        }
        else{
        $randomsubcategory=$randomsubcategory->get()->random(7);
        }   
        
        $subcategorycount=Category::with('products')
                                    ->where([['parent_id','!=',0],['status','=','1']])
                                    ->get();        

        $productdetails=Product::with('ProductCategory','ProductCategory.Category','ProductImage')
                                ->where([['id','=',$id]])
                                ->orderBy('id','DESC')
                                ->first();        
        $cms=CMS::where('type','=','footer')->get();
        
        return view('Eshopper/product-details',['category'=>$category,'productdetails'=>$productdetails,'randomsubcategory'=>$randomsubcategory,'recommendedproduct'=>$recommendedproduct,'givencategory'=>$givencategory,'subcategorycount'=>$subcategorycount,'cms'=>$cms]);  

    }

    /**
     * function to add product to wishlist
     */
    public function wishList($id){
        $wishlistProductCount=wishList::where('product_id',$id)->get()->count();
        if($wishlistProductCount < 1){
            $wishData['product_id']=$id;
            $wishData['user_id']=Auth::user()->id;
            Wishlist::create($wishData);
            return redirect()->back()->with('alert','Your product added to Wishlist.');
        }
        else{
            return redirect()->back()->with('alert','This product is already added to Wishlist.');

        }
    }

    /**
     * function  to show wishlist
     */
    public function myWishList(){
        $cms=CMS::where('type','=','footer')->get();
        $wishList=Wishlist::with('wishlistProduct','ProductImage')->where('user_id','=',Auth::user()->id)->get();
        //dd($wishList);
        return view('Eshopper.wishlist',['cms'=>$cms,'wishList'=>$wishList]);
    }

    /**
     * function to return profile view
     */
    public function userProfile(){
        $cms=CMS::where('type','=','footer')->get();

        return view('Eshopper.profile',['cms'=>$cms]);
    }

    /**
     * function to update user profile details
     */
    public function userProfileUpdate(UserProfileValidation $request){
        //dd($request->all());
        $userData['firstname']=$request->firstname;
        $userData['lastname']=$request->lastname;
        $userData['email']=$request->email;
        User::whereId(Auth::user()->id)->update($userData);
        return redirect('eshopper/user-profile')->with('flash_message',' Profile  Updated !');
    }

    /**
     * function to return change password view
     */
    public function changePassword(){
        $cms=CMS::where('type','=','footer')->get();

        return view('Eshopper.changepassword',['cms'=>$cms]);
    }
    
    /**
     * function to update user password
     */
    public function updatePassword(UpdatePasswordValidation $request){

        if (!(Hash::check($request->oldpassword, Auth::user()->password))) {
            return redirect()->back()->with("flash_message","Your current password does not matches with the password you provided. Please try again.");
        }
     
        if(strcmp($request->oldpassword, $request->newpassword) == 0){
            return redirect()->back()->with("flash_message","New Password cannot be same as your current password. Please choose a different password.");
        }

        if(strcmp($request->newpassword, $request->confirmpassword) != 0){
            return redirect()->back()->with("flash_message","New Password and confirm password does not matches with the password you provided. Please try again.");
        }
        
        $password= bcrypt($request->newpassword);
        User::whereId(Auth::user()->id)->update(['password'=>$password]);
        
        return redirect()->back()->with('flash_message',' Password  Updated !');
    }

    /**
     * function to display orders of logged user
     */
    public function myOrders(){
        $orders=Order::with('Orders')
                    ->where('user_id','=',Auth::user()->id)
                    ->orderBy('id','desc')
                    ->paginate(10);
        //dd($orders);
        $cms=CMS::where('type','=','footer')->get();

        return view('Eshopper.myorder',['orders'=>$orders,'cms'=>$cms]);
    }

    /**
     * function to show all deatils of the respective order 
     */
    public function myOrderDetails($id){
        $orders=Order::with('Orders','OrderDetails','Addresses')
                    ->where('id','=',$id)
                    ->get();
        $orderStatus=OrderDetails::where('order_id','=',$id)
                    ->first();
        $coupon=Coupon::whereId($orders[0]->coupon_id)
                    ->first();
        //dd($orders);
        $cms=CMS::where('type','=','footer')->get();

        return view('Eshopper.myorderdetails',['orders'=>$orders,'status'=>$orderStatus->status,'orderId'=>$id,'cms'=>$cms,'coupon'=>$coupon]);

    }

     /**
     * function to load track order view
     */
    public function trackOrderView(){
        $cms=CMS::where('type','=','footer')->get();

        return view('Eshopper.trackorderview',['cms'=>$cms]);
     }

    /**
     * function to track order
     */
    public function trackOrder(TrackOrderValidation $request){
        $email=$request->email;
        $orderId=$request->order_id;
        
        $user=User::where('email','=',$email)
                    ->first();
        if($user==""){
            return redirect()->back()->with('flash_message','Invalid Email or Order Id !');
        }
        $userId=$user->id;
        $orderStatus=OrderDetails::where([['order_id','=',$orderId],['user_id','=',$userId]])
                    ->first();

        if($orderStatus==""){
            return redirect()->back()->with('flash_message','Invalid Email or Order Id !');
        }
        $cms=CMS::where('type','=','footer')->get();

        return view('Eshopper.trackorder',['status'=>$orderStatus->status,'orderId'=>$orderId,'cms'=>$cms]);
       
    }

    /** Function to track order from order list */
    public function trackOrderFromOrderList($id){
        $orderStatus=OrderDetails::where('order_id','=',$id)
                    ->first();
        $cms=CMS::where('type','=','footer')->get();

        return view('Eshopper.trackorder',['status'=>$orderStatus->status,'orderId'=>$id,'cms'=>$cms]);
    }
    
    /**
     * function to load contact us view
     */
    public function contactUsView(){
        
        $cms=CMS::where('type','=','footer')->get();
        $cmsContact=CMS::where('title','=','Conatct info')->first();
        return view('Eshopper.contact-us',['cms'=>$cms,'cmsContact'=> $cmsContact]);
    }

     /**
     * function to store contact us data
     */
    public function contactUs(ContactUsValidation $request){
       //dd($request->all());
       $contactData['name']=$request->name;
       $contactData['email']=$request->email;
       $contactData['subject']=$request->subject;
       $contactData['message']=$request->message;
       $contact=ContactUs::create($contactData);
       if($contact){
            $contactData['flag']='contact us for admin';
            Mail::to($request->email)->send(new Mailtrap($contactData));
            return redirect()->back()->with('flash_message','Thank You for contacting us. we will be in touch soon !');
       }

    }

    /**
     * function for  about us cms
     */
    public function aboutUs(){
        $cms=CMS::where('type','=','footer')->get();
        $cmsAbout=CMS::where('title','=','About us')->first();
        return view('Eshopper.aboutus',['cms'=>$cms,'cmsAbout'=>$cmsAbout]);
    }

    /**
     * function for Privacy & Terms cms
     */
    public function privacyTerms(){
        $cms=CMS::where('type','=','footer')->get();
        $cmsPrivacy=CMS::where('title','=','Privacy & terms')->first();
        return view('Eshopper.privacy',['cms'=>$cms,'cmsPrivacy'=>$cmsPrivacy]);

    }
   
    /**
     * function for return & refund cms
     */
    public function returnRefund(){
        $cms=CMS::where('type','=','footer')->get();
        $cmsReturnRefund=CMS::where('title','=','Returns & refund')->first();
        return view('Eshopper.returnrefund',['cms'=>$cms,'cmsReturnRefund'=>$cmsReturnRefund]);

    }

    /**
     * function for Purchase Protection cms
     */
    public function purchaseProtection(){
        $cms=CMS::where('type','=','footer')->get();
        $cmspurchaseProtection=CMS::where('title','=','100% purchase protection')->first();
        return view('Eshopper.purchaseprotection',['cms'=>$cms,'cmspurchaseProtection'=>$cmspurchaseProtection]);
    }
   

}
