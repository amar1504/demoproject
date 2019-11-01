<?php

namespace App\Http\Controllers\Eshopper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\ProductImage;
use App\ProductCategory;
use App\Banner;
class EshopperController extends Controller
{
    
    public function index(){
        $category=Category::with('subCategories')->where([['parent_id','=',0],['status','=','1']])->get();
        //dd($category);
        $categoryCount=Category::where([['parent_id','=',0],['status','=','1']])->count();
        
        $banner=Banner::where([['status','=','1']])->get();
        $product=Product::with('ProductCategory','ProductCategory.Category','ProductImage')->where([['status','=','1']])->orderBy('id','DESC')->take(9)->get();        
        $recommendedproduct=Product::with('ProductCategory','ProductCategory.Category','ProductImage')->where([['status','=','1']])->orderBy('id','DESC')->get()->random(9);        
        $recommendedproduct=array_chunk($recommendedproduct->toArray(), 3);
        
        $randomsubcategory=Category::where([['parent_id','!=',0],['status','=','1']])->get()->random(7);        
  
        if(request()->dev==1){ dd($categoryCount->toArray()); }
        //dd($mencategory);
        return view('Eshopper/master',['category'=>$category,'banner'=>$banner,'product'=>$product,'randomsubcategory'=>$randomsubcategory,'recommendedproduct'=>$recommendedproduct]);  
     }
    
    public function featuresItem(Request $request){
        //dd($request->all());
        $id=$request->category_id;
        $product=ProductCategory::with('Product','ProductImages')->where('category_id','=',$id)
                                ->take(4)
                                    ->get();   
        
        return response()->json(['name' => $id,'product'=>$product]);

    }
    
    

}
