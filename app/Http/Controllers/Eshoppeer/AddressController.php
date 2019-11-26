<?php

namespace App\Http\Controllers\Eshoppeer;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Address;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\ProductImage;
use App\ProductCategory;
use App\Banner;
use App\CMS;
use App\Role;
use App\User;
use Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;
        $category=Category::with('subCategories')->where([['parent_id','=',0],['status','=','1']])->get();
        $subcategorycount=Category::with('products')->where([['parent_id','!=',0],['status','=','1']])->get();        
        $user_id=Auth::user()->id;
        if (!empty($keyword)) {
            $address = Address::where('user_id','=',$user_id)
                ->where('name', 'LIKE', "%$keyword%")
                ->orWhere('address1', 'LIKE', "%$keyword%")
                ->orWhere('address2', 'LIKE', "%$keyword%")
                ->orWhere('country', 'LIKE', "%$keyword%")
                ->orWhere('state', 'LIKE', "%$keyword%")
                ->orWhere('city', 'LIKE', "%$keyword%")
                ->orWhere('zipcode', 'LIKE', "%$keyword%")
                ->orWhere('mobileno', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $address = Address::where('user_id','=',$user_id)->latest()->paginate($perPage);
        }
         $cms=CMS::where('type','=','footer')->get();


        return view('Eshopper.address.index', compact('address'),['category'=>$category,'subcategorycount'=>$subcategorycount,'cms'=>$cms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $category=Category::with('subCategories')->where([['parent_id','=',0],['status','=','1']])->get();
        $subcategorycount=Category::with('products')->where([['parent_id','!=',0],['status','=','1']])->get();        
         $cms=CMS::where('type','=','footer')->get();

        return view('Eshopper.address.create',['category'=>$category,'subcategorycount'=>$subcategorycount,'cms'=>$cms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Address::create($requestData);

        return redirect('eshopper/address')->with('flash_message', 'Address added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Address $address)
    {
        //$address = Address::findOrFail($id);
        $category=Category::with('subCategories')->where([['parent_id','=',0],['status','=','1']])->get();
        $subcategorycount=Category::with('products')->where([['parent_id','!=',0],['status','=','1']])->get();        
         $cms=CMS::where('type','=','footer')->get();
        
        return view('Eshopper.address.show', compact('address'),['category'=>$category,'subcategorycount'=>$subcategorycount,'cms'=>$cms]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Address $address)
    {
        $category=Category::with('subCategories')->where([['parent_id','=',0],['status','=','1']])->get();
        $subcategorycount=Category::with('products')->where([['parent_id','!=',0],['status','=','1']])->get();        
         $cms=CMS::where('type','=','footer')->get();
        
        return view('Eshopper.address.edit', compact('address'),['category'=>$category,'subcategorycount'=>$subcategorycount,'cms'=>$cms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Address $address)
    {
        $requestData = $request->all();   
        $address->update($requestData);
        
        return redirect('eshopper/address')->with('flash_message', 'Address updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return redirect('eshopper/address')->with('flash_message', 'Address deleted!');
    }
}
