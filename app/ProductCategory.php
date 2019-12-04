<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\category;
class ProductCategory extends Model
{
 
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table="product_categories";
    
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable=['category_id','product_id'];
    

    /**
     * Get product that product category belongs to 
     */
    
    public function Product() {
        return $this->belongsTo('App\Product', 'product_id','id' );

    }

    /**
     * Get product images associated to product 
     */
    
    public function ProductImages() {
        return $this->hasMany('App\ProductImage', 'product_id','product_id' );

    }

    /**
     * Get category that product category belongs to 
     */
    
    public function Category() {
        return $this->belongsTo('App\Category', 'category_id', 'id');

    }

 
    
}
