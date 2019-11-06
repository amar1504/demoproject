<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Coupon extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'coupons';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['coupon_title', 'code', 'description', 'discount', 'type','status'];

    
}
