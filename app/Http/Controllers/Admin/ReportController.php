<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CMS;
use App\OrderDetails;
use App\Order;
use App\Coupon;
use App\User;
use App\Role;

class ReportController extends Controller
{
    /**
     * function for sales report
     */
    public function saleReport(){   
        $cms=CMS::where('type','=','footer')->get();
        $order=OrderDetails::get()->count();
        $orderCod=OrderDetails::where('payment_mode','=',"0")->get()->count();
        $orderPaypal=OrderDetails::where('payment_mode','=',"1")->get()->count();
        return view('admin.salereport',['cms'=>$cms,'order'=>$order,'orderCod'=>$orderCod,'orderPaypal'=>$orderPaypal]);
        
    }

     /**
     * function for coupon report
     */
    public function couponReport(){
        $totalCoupons=0;
        $cms=CMS::where('type','=','footer')->get();
        $coupons=Coupon::get();
        foreach($coupons as $coupon){
            $totalCoupons+=$coupon->quantity;
        }
        $usedCoupons=Order::where('coupon_id','!=','0')->get()->count();
        $unUsedCoupons=$totalCoupons-$usedCoupons;
        return view('admin.couponreport',['cms'=>$cms,'totalCoupons'=>$totalCoupons,'usedCoupons'=>$usedCoupons,'unUsedCoupons'=>$unUsedCoupons]);
        
    }
}
