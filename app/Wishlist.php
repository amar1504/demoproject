<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
      /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'wishlist';

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
    protected $fillable = ['product_id','user_id'];

    /**
     * Get product record assocated with wishlist
     */    
    public function wishlistProduct() {
        return $this->hasMany('App\Product','id','product_id');

    }

    /**
     * Get product image assocated with product 
     */
    public function ProductImage() {
        return $this->hasMany('App\ProductImage','product_id','product_id');
    }   
    


}
