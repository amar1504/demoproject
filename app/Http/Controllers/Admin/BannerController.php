<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerManagementValidation;
use App\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
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
            $banner = Banner::where('title', 'LIKE', "%$keyword%")
                            ->orWhere('bannerimage', 'LIKE', "%$keyword%")
                            ->latest()
                            ->paginate($perPage);
        } else {
            $banner = Banner::latest()->paginate($perPage);
        }

        return view('admin.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(BannerManagementValidation $request)
    {
        $requestData = $request->all();
        if ($request->hasFile('bannerimage')) {
            $requestData['bannerimage'] = $request->file('bannerimage')
                        ->store('uploads', 'public');
        }

        Banner::create($requestData);

        return redirect('admin/banner')->with('flash_message', 'Banner added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Banner $banner)
    {
        return view('admin.banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(BannerManagementValidation $request,Banner $banner)
    {
        if($request->file('bannerimage')){
            dd('yes');
        }
        $requestData = $request->all();
        if ($request->hasFile('bannerimage')) {
            $requestData['bannerimage'] = $request->file('bannerimage')
                        ->store('uploads', 'public');
        }

        $banner->update($requestData);

        return redirect('admin/banner')->with('flash_message', 'Banner updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return redirect('admin/banner')->with('flash_message', 'Banner deleted!');
    }
}
