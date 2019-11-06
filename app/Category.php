<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\ProductCategory;

class Category extends Model
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
    protected $table = 'categories';

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
    protected $fillable = ['parent_id','category_name','status'];


    /**
     * Get category record assocated with subcategories 
     */

    // catgeory and subcategory relationship -start
    public function subCategories() {
        return $this->hasMany('App\Category','parent_id','id');

    }
    // catgeory and subcategory relationship -End

     /**
     * Get category record assocated with products 
     */

    // catgeory and products relationship -start
    public function products() {
        return $this->hasMany('App\ProductCategory','category_id','id');

    }
    // catgeory and products relationship -End
}
