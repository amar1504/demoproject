<?php

namespace App\Http\Controllers\Eshopper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;

use App\Category;
use App\Product;
use App\ProductImage;
use App\ProductCategory;

class CartController extends Controller
{
    public function index(){
        
        //return Cart::content().'<br/> total :'.Cart::total().' <br/> Tax: '.Cart::tax().'<br/> subtotal: '.Cart::subtotal().'<br/> count: '.Cart::count();
        return view('Eshopper.cart',['cartcontent'=>Cart::content(),'total'=>Cart::total(),'tax'=>Cart::tax(),'subtotal'=>Cart::subtotal(),'count'=>Cart::count()]);
    }

    public function addItem($id){

        $productdetails=Product::with('ProductCategory','ProductCategory.Category','ProductImage')->where([['id','=',$id]])->orderBy('id','DESC')->first();        
        echo 'id '.$productdetails->id.' name '.$productdetails->product_name.' price '.$productdetails->price;
        $product_image=$productdetails->ProductImage->first()->product_image;
        //dd($productdetails);
        Cart::add($productdetails->id,$productdetails->product_name, 1, $productdetails->price,['product_image'=>$product_image]);

        return redirect('eshopper/cart');
    }

    public function removeItem($rowId){

        Cart::remove($rowId);
        return redirect('eshopper/cart');
    }

    public function updateQty($rowId){
        //echo $rowId;
        $getproduct=Cart::get($rowId);
        echo $qty=$getproduct->qty ;
        Cart::update($rowId, $qty-1); // Will update the quantity
        return redirect('eshopper/cart');
    }

    

}
