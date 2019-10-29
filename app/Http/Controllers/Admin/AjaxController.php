<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class AjaxController extends Controller
{
    public function index(Request $request)
    {
        echo "hii";
        //echo $request->category_id;
        /* $subcat=Category::where('parent_id','=',$request->category_id)->get();
        foreach($subcat as $scat){
            $cat.="<option value='<?=$subcat->$id?>'><?=$subcat->category_name?></option>";
        }

        echo $cat; */
    }
}
