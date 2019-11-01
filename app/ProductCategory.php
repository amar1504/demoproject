<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\category;
class ProductCategory extends Model
{
    
    protected $table="product_categories";
    protected $fillable=['category_id','product_id'];
    
    public function Product() {
        return $this->belongsTo('App\Product', 'product_id','id' );

    }

    public function ProductImages() {
        return $this->hasOne('App\ProductImage', 'product_id','id' );

    }

    public function Category() {
        return $this->belongsTo('App\Category', 'category_id', 'id');

    }

 
    
}
