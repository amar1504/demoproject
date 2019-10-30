<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\productCategory;
use App\productImage;
class Product extends Model
{
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
    // protected $fillable = ['category_id', 'product_name', 'price', 'description', 'product_image'];
    protected $fillable = ['product_name', 'price', 'description','status'];

    //Product and ProductImage relationship -start
    public function ProductCategory() {
        return $this->hasOne('App\ProductCategory' );

    }
    //Product and ProductImage relationship -End
    
    public function ProductImage() {
        return $this->hasOne('App\ProductImage');

    }
}
