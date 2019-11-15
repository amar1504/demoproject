<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

     /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'address_id','subtotal','tax','shipping_charge','discount', 'total','coupon_id'];

    /**
     *  order and productorder relationship 
     */
    public function Orders() {
        return $this->hasMany('App\ProductOrder','order_id','id');

    }

     /**
     *  order and order details relationship 
     */
    public function OrderDetails() {
        return $this->hasOne('App\OrderDetails','order_id','id');

    }

     /**
     *  order and productorder relationship 
     */
    public function Addresses() {
        return $this->hasone('App\Address','id','address_id');

    }

}
