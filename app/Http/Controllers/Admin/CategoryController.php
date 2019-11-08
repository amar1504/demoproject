<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryValidation;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
            $category = Category::Where('category_name', 'LIKE', "%$keyword%")
                                ->where('parent_id','=',0)
                                ->latest()
                                ->paginate($perPage);
        } else {
            $category = Category::where('parent_id','=',0)->latest()->paginate($perPage);
        }

        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $parentCategory=Category::where('parent_id','=',0)->get();
        return view('admin.category.create',['parentCategory'=>$parentCategory]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CategoryValidation $request)
    {
        $requestData = $request->all();
        Category::create($requestData);
        return redirect('admin/category')->with('flash_message', 'Category added!');
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
        $category = Category::findOrFail($id);
        $subcat=Category::where('parent_id','=',$id)->get();
        return view('admin.category.show', compact('category'),['subcat'=>$subcat]);
    }


    public function showSubCat($id)
    {
        $category = Category::findOrFail($id);
        
        return view('admin.category.showSubCat', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Category $category)
    {
        $parentCategory=Category::where('parent_id','=',0)->get();
      
        return view('admin.category.edit', compact('category'),['parentCategory'=>$parentCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CategoryValidation $request, Category $category)
    {
        $requestData = $request->all();
        $category->update($requestData);

        return redirect('admin/category')->with('flash_message', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('admin/category')->with('flash_message', 'Category deleted!');
    }

    /**
     * Display listing of subcatgeory
     */
    public function SubCategoryList(Request $request){
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $category = Category::Where('category_name', 'LIKE', "%$keyword%")
                                ->where('parent_id','!=',0)
                                ->latest()
                                ->paginate($perPage);
        } else {
            $category = Category::where('parent_id','!=',0)->latest()->paginate($perPage);
        }

       return view('admin/category/subcategory',['category'=>$category]);
    }

    /**
     * Display Specified Subcategory
     */
    public function showSubcategory($id){
        $category = Category::findOrFail($id);
        return view('admin.category.showscat', compact('category'));
    }

    /**
     * Edit Specified Subcatgory
     */
    public function editSubcategory($id){
        
        $category = Category::findOrFail($id);
        $parentCategory=Category::where('parent_id','=',0)->get();
        return view('admin.category.editscat', compact('category'),['parentCategory'=>$parentCategory]);
    }

    /**
     * create subcategory
     */
    public function createSubcategory()
    {
        //echo "hello";
        $parentCategory=Category::where('parent_id','=',0)->get();
        return view('admin.category.createscat',['parentCategory'=>$parentCategory]);
    }

    /**
     * Update Specified subcategory
     */
    public function updateSubcategory(CategoryValidation $request, Category $category)
    {
        $requestData = $request->all();
        $a=$category->update($requestData);
        
        return redirect('admin/subcategorylist')->with('flash_message', 'Subcategory updated!');
    }
 
    /**
     * Store the subcategory
     */
    public function storeSubcategory(CategoryValidation $request)
    {
        $requestData = $request->all();
        Category::create($requestData);
        return redirect('admin/subcategorylist')->with('flash_message', 'Subcategory added!');
    }

    public function destroySubcategory(Category $category)
    {
        $category->delete();
        return redirect('admin/subcategorylist')->with('flash_message', 'Subcategory deleted!');
    }

}
