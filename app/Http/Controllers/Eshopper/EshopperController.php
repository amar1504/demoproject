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
        if(request()->dev==1){ dd($category->toArray()); }
        $categoryCount=Category::where([['parent_id','=',0],['status','=','1']])->count();
        $banner=Banner::where([['status','=','1']])->get();
        $product=Product::with('ProductCategory','ProductCategory.Category','ProductImage')->where([['status','=','1']])->orderBy('id','DESC')->take(6)->get();        
        $mencategoryid=Category::where([['category_name','=','men'],['status','=','1']])->first();        
        $mencategory=Category::where([['parent_id','=',$mencategoryid->id],['status','=','1']])->get();
  
        //dd($mencategory);
        return view('Eshopper/master',['category'=>$category,'banner'=>$banner,'product'=>$product,'mencategory'=>$mencategory]);  
    }
    

}
