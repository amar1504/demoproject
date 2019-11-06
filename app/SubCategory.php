<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

    /**
     * Get category record assocated with subcatgeory 
     */
    
    // catgeory and subcategory relationship -start
    public function category() {
       return $this->belongsTo('App\Category', 'parent_id', 'id');
    }
    // catgeory and subcategory relationship -start

}
