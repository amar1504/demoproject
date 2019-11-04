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
class EshopperController extends Controller
{
    
    public function index(){
        $category=Category::with('subCategories')->where([['parent_id','=',0],['status','=','1']])->get();
        //dd($category);     
        $banner=Banner::where([['status','=','1']])->get();
        $product=Product::with('ProductCategory','ProductCategory.Category','ProductImage')->where([['status','=','1']])->orderBy('id','DESC')->take(9)->get();        
        $recommendedproduct=Product::with('ProductCategory','ProductCategory.Category','ProductImage')->where([['status','=','1']])->orderBy('id','DESC')->get()->random(9);        
        $recommendedproduct=array_chunk($recommendedproduct->toArray(), 3);
        
        $randomsubcategory=Category::where([['parent_id','!=',0],['status','=','1']])->get()->random(7);        
  
        if(request()->dev==1){ dd($randomsubcategory->toArray()); }
        //dd($mencategory);
        return view('Eshopper/master',['category'=>$category,'banner'=>$banner,'product'=>$product,'randomsubcategory'=>$randomsubcategory,'recommendedproduct'=>$recommendedproduct]);  
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
        
        // dd($givencategory);     

        $recommendedproduct=Product::with('ProductCategory','ProductCategory.Category','ProductImage')->where([['status','=','1']])->orderBy('id','DESC')->get()->random(9);        
        $recommendedproduct=array_chunk($recommendedproduct->toArray(), 3);
        
        $randomsubcategory=Category::where([['parent_id','!=',0],['status','=','1']])->get()->random(7);        
  
        return view('Eshopper/product',['category'=>$category,'product'=>$product,'randomsubcategory'=>$randomsubcategory,'recommendedproduct'=>$recommendedproduct,'givencategory'=>$givencategory]);  

    }

}
