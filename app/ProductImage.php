<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table="product_images";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=['product_id','product_image'];


    /**
     * Get product that product Image belongs to 
     */
    public function ProductImg() {
        return $this->belongsTo('App\Product');
    }

}
