<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\productCategory;
use App\productImage;
class Product extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
    protected $fillable = ['product_name', 'price', 'description','quantity','status'];

    /**
     * Get product category record assocated with product 
     */
    
    //Product and ProductImage relationship -start
    public function ProductCategory() {
        return $this->hasOne('App\ProductCategory' );

    }
    //Product and ProductImage relationship -End
    
    /**
     * Get product image assocated with product 
     */
    public function ProductImage() {
        return $this->hasMany('App\ProductImage');

    }

    /**
     * Get product Attributes record assocated with product 
     */
    public function ProductAttributes() {
        return $this->hasOne('App\ProductAttributesAssoc' );

    }
    

}
