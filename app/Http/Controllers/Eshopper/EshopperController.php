<?php

namespace App\Http\Controllers\Eshopper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\ProductImage;
use App\ProductCategory;
use App\Banner;
use App\Role;
use App\User;
use App\Mail\Mailtrap;
use Mail;

class EshopperController extends Controller
{
    
    public function index(){
        $category=Category::with('subCategories')->where([['parent_id','=',0],['status','=','1']])->get();
        $banner=Banner::where([['status','=','1']])->get();
        $product=Product::with('ProductCategory','ProductCategory.Category','ProductImage')->where([['status','=','1']])->orderBy('id','DESC')->take(9)->get();        
        $recommendedproduct=Product::with('ProductCategory','ProductCategory.Category','ProductImage')->where([['status','=','1']])->orderBy('id','DESC')->get()->random(9);        
        $recommendedproduct=array_chunk($recommendedproduct->toArray(), 3);
        
        $randomsubcategory=Category::where([['parent_id','!=',0],['status','=','1']])->get()->random(7);        
  
        if(request()->dev==1){ dd($randomsubcategory->toArray()); }
        //dd($mencategory);
        $subcategorycount=Category::with('products')->where([['parent_id','!=',0],['status','=','1']])->get();        
        //dd($subcategorycount);
        return view('Eshopper/master',['category'=>$category,'banner'=>$banner,'product'=>$product,'randomsubcategory'=>$randomsubcategory,'recommendedproduct'=>$recommendedproduct,'subcategorycount'=>$subcategorycount]);  
     }
    
    public function featuresItem(Request $request){
        //dd($request->all());
        $id=$request->category_id;
        $product=ProductCategory::with('Product','ProductImages')
                                ->where('category_id','=',$id)
                                ->take(4)
                                ->get();   
        
        return response()->json(['name' => $id,'product'=>$product]);

    }

    public function userLogin(){
        $role=Role::where('role_name','=','customer')->first();
        return view('Eshopper/login',['role_id'=>$role->id]);
    }
    
    public function product($id){
        $category=Category::with('subCategories')->where([['parent_id','=',0],['status','=','1']])->get();
        $product=ProductCategory::with('Product','ProductImages','Category')->where([['category_id','=',$id]])->orderBy('id','DESC')->get();        

        $givencategory=Category::where([['id','=',$id],['status','=','1']])->first();
        
        $recommendedproduct=Product::with('ProductCategory','ProductCategory.Category','ProductImage')->where([['status','=','1']])->orderBy('id','DESC')->get()->random(9);        
        $recommendedproduct=array_chunk($recommendedproduct->toArray(), 3);
        
        $randomsubcategory=Category::where([['parent_id','!=',0],['status','=','1']])->get()->random(7);        
        $subcategorycount=Category::with('products')->where([['parent_id','!=',0],['status','=','1']])->get();        

        return view('Eshopper/product',['category'=>$category,'product'=>$product,'randomsubcategory'=>$randomsubcategory,'recommendedproduct'=>$recommendedproduct,'givencategory'=>$givencategory,'subcategorycount'=>$subcategorycount]);  

    }
    
    public function forgotPasswordview()
    {
        return view('Eshopper/forgotpassword');
    } 

    public function forgotpassword(Request $request)
    {
        //echo $request->email; 
        $password=str_random(8,12);
        $data=array(
            'email'=>$request->email,
            'password'=> $password
        );
        Mail::to($request->email)->send(new Mailtrap($data));
 
        $updatePassword=User::where('email','=',$request->email)->update(['password'=>bcrypt($password)]);
        return redirect('eshopper/forgotpassword')->with('flash_message', 'We will shortly notify you by mail. Thank You -Eshopper !');
    }


    public function productDetails($id){
        $category=Category::with('subCategories')->where([['parent_id','=',0],['status','=','1']])->get();
        $givencategory=Category::where([['id','=',$id],['status','=','1']])->first();
        
        // dd($givencategory);     

        $recommendedproduct=Product::with('ProductCategory','ProductCategory.Category','ProductImage')->where([['status','=','1']])->orderBy('id','DESC')->get()->random(9);        
        $recommendedproduct=array_chunk($recommendedproduct->toArray(), 3);
        
        $randomsubcategory=Category::where([['parent_id','!=',0],['status','=','1']])->get()->random(7);        
        $subcategorycount=Category::with('products')->where([['parent_id','!=',0],['status','=','1']])->get();        

        $productdetails=Product::with('ProductCategory','ProductCategory.Category','ProductImage')->where([['id','=',$id]])->orderBy('id','DESC')->first();        
    
        return view('Eshopper/product-details',['category'=>$category,'productdetails'=>$productdetails,'randomsubcategory'=>$randomsubcategory,'recommendedproduct'=>$recommendedproduct,'givencategory'=>$givencategory,'subcategorycount'=>$subcategorycount]);  

    }

}
