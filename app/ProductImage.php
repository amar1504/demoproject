<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table="product_images";
    protected $fillable=['product_id','product_image'];

    public function ProductImg() {
        return $this->belongsTo('App\Product');
    }

}
