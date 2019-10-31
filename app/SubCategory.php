<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    // catgeory and subcategory relationship -start

    public function category() {
       // return $this->belongsTo('App\Category');
        return $this->belongsTo('App\Category', 'parent_id', 'id');
      
    }
    // catgeory and subcategory relationship -start

}
