<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use App\ProductCategory;
use App\Category;
use App\Http\Requests\ProductValidation;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $product = Product::Where('product_name', 'LIKE', "%$keyword%")
                    ->orWhere('price', 'LIKE', "%$keyword%")
                    ->orWhere('description', 'LIKE', "%$keyword%")
                    ->latest()
                    ->paginate($perPage);
        } else {
            $product = Product::with('ProductCategory','ProductCategory.Category','ProductImage')
                        ->latest()
                        ->paginate($perPage);
           // dd($product->toArray());
        }
        $category=Category::get();

        return view('admin.product.index', compact('product'),['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $category=Category::where([ ['parent_id','=',0],['status','=','1'] ])->get();
        $subcategory=Category::where([ ['parent_id','!=',0],['status','=','1'] ])->get();

        return view('admin.product.create',['category'=>$category,'subcategory'=>$subcategory]  );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProductValidation $request)
    {
        if(isset($request->subcategory_id))
        {
            $request->category_id=$request->subcategory_id;
        }
        $product=Product::create($request->toArray());

        $files = $request->file('product_image');
        if ($request->hasFile('product_image')) {

            foreach ($files as $image) {
                $requestData['product_image'] = $image->store('productimages', 'public');
                ProductImage::create(['product_id'=>$product->id,'product_image'=>$requestData['product_image']]);
            }

        } 
        else
        {
            ProductImage::create(['product_id'=>$product->id,'product_image'=>$requestData['product_image']]);
        }    
        // $product=Product::create(['product_name'=>$request->product_name,'price'=>$request->price,'description'=>$request->description]);
        ProductCategory::create(['category_id'=>$request->category_id,'product_id'=>$product->id]);
        

        return redirect('admin/product')->with('flash_message', 'Product added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Product $product)
    {
       // $product = Product::findOrFail($id);

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $category=Category::where([ ['parent_id','=',0],['status','=','1'] ])->get();
        $subcategory=Category::where([ ['parent_id','!=',0],['status','=','1'] ])->get();

        $productCat = ProductCategory::where('product_id','=',$id)->first();
        $parentcat=Category::where('id','=',$productCat->category_id)->first();
        $product = Product::findOrFail($id);

        return view('admin.product.edit', compact('product'),['category'=>$category,'subcategory'=>$subcategory,'productCategory'=>$productCat, 'parentcat'=>$parentcat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ProductValidation $request, $id)
    {
        $product = Product::findOrFail($id);
        $requestData = $request->all();
        
        if(isset($request->subcategory_id))
        {
            $request->category_id=$request->subcategory_id;
        }
        
        $product->update($requestData);
        $productImg = ProductImage::where('product_id','=',$id)->first();
        $productImg1 = ProductImage::where('product_id','=',$id)->get();
        $productCat = ProductCategory::where('product_id','=',$id)->first();

        $files = $request->file('product_image');
        if ($request->hasFile('product_image')) {

            foreach ($files as $image) {
                $requestData['product_image'] = $image->store('productimages', 'public');
                //ProductImage::create(['product_id'=>$product->id,'product_image'=>$requestData['product_image']]);
                ProductImage::whereId($productImg->id)->update(['product_id'=>$product->id,'product_image'=>$requestData['product_image'] ]);
            }

        } 
        else{
            foreach ($productImg1 as $image) {
                $requestData['product_image']=$image->product_image;                
            
                ProductImage::whereId($image->id)->update(['product_id'=>$product->id,'product_image'=>$requestData['product_image'] ]);
            }
        }

        //echo $requestData['product_image'];
        
        ProductImage::whereId($productImg->id)->update(['product_id'=>$product->id,'product_image'=>$requestData['product_image'] ]);
        ProductCategory::whereId($productCat->id)->update(['category_id'=>$request->category_id,'product_id'=>$product->id]);
        
        return redirect('admin/product')->with('flash_message', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect('admin/product')->with('flash_message', 'Product deleted!');
    }

    public function dropdownCat(Request $request)
    {
        // dd($request->all());
        $cat=$request->category_id;
        $subcat=Category::where('parent_id',$cat)->get();
        return response()->json(['name' => $subcat]);
        //$subcat=Category::where('parent_id',$request->category_id)->get();
        
    }

}
