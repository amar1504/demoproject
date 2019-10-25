<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\ProductImage;
use App\ProductCategory;
use App\Category;
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
        $perPage = 25;

        if (!empty($keyword)) {
            $product = Product::where('category_id', 'LIKE', "%$keyword%")
                ->orWhere('product_name', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('product_image', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $product = Product::with('ProductCategory','ProductCategory.Category','ProductImage')->latest()->paginate($perPage);
            
        }
        //dd($product);
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
        $category=Category::get();

        return view('admin.product.create',['category'=>$category]  );
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
        
        // $requestData = $request->all();
        if ($request->hasFile('product_image')) {
            $requestData['product_image'] = $request->file('product_image')
                ->store('productimages', 'public');
        } 
        $product=Product::create(['product_name'=>$request->product_name,'price'=>$request->price,'description'=>$request->description]);
        ProductImage::create(['product_id'=>$product->id,'product_image'=>$requestData['product_image']]);
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
    public function show($id)
    {
        $product = Product::findOrFail($id);

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
        $category=Category::get();
        
        $productCat = ProductCategory::where('product_id','=',$id)->first();
        // dd($productCat->category_id);
        $product = Product::findOrFail($id);

        return view('admin.product.edit', compact('product'),['category'=>$category,'productCategory'=>$productCat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $requestData = $request->all();

        
        $product->update($requestData);
        $productImg = ProductImage::where('product_id','=',$id)->first();
        $productCat = ProductCategory::where('product_id','=',$id)->first();

        if ($request->hasFile('product_image')) {
            $requestData['product_image'] = $request->file('product_image')
            ->store('productimages', 'public');

        }
        else{
            $requestData['product_image']=$productImg->product_image;
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
}
