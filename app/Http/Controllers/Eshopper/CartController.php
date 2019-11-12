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
    public function addItems(Request $request){

        $rowId=$request->id;
        $getproduct=Cart::get($rowId);
        Cart::update($rowId, $getproduct->qty+1); // This Will update the quantity
        $upitem=$getproduct=Cart::get($rowId);
        return response()->json(['qty'=>$upitem->qty,'itemsubtotal'=>$upitem->subtotal,'total'=>Cart::total(),'tax'=>Cart::tax(),'subtotal'=>Cart::subtotal()]);
        
    } 

     /**
     * function to decrease quantity
     */
    public function removeItems(Request $request){

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
        }
        else{
            $discount=$coupon->discount;
        }

        if(count($coupon)>=1){
            return response()->json(['name'=>$request->code,'discount'=>$discount,'total'=>Cart::total()]);
        }
        else{
            return response()->json(['error_msg'=>'Invalid Coupon']);
        }
        //return response()->json(['name'=>$request->code,'count'=>count($coupon)]);

    }    

}
