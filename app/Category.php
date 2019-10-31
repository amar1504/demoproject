<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductCategory;
class Category extends Model
{
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

    // catgeory and subcategory relationship -start
    public function subCategories() {
        //return $this->hasMany('App\Category','id','parent_id');
        return $this->hasMany('App\Category','parent_id','id');

    }
    // catgeory and subcategory relationship -End

}
