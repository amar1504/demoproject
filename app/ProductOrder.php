<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table="product_order";

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=['order_id','product_id','quantity','name','price','product_image','user_id'];

}
