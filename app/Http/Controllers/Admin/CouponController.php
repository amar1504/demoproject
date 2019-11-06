<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponValidation;

use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
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
            $coupon = Coupon::where('coupon_title', 'LIKE', "%$keyword%")
                            ->orWhere('code', 'LIKE', "%$keyword%")
                            ->orWhere('description', 'LIKE', "%$keyword%")
                            ->orWhere('discount', 'LIKE', "%$keyword%")
                            ->latest()
                            ->paginate($perPage);
        } else {
            $coupon = Coupon::latest()->paginate($perPage);
        }

        return view('admin.coupon.index', compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CouponValidation $request)
    {
        $requestData = $request->all();
        Coupon::create($requestData);
        return redirect('admin/coupon')->with('flash_message', 'Coupon added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Coupon $coupon)
    {
        return view('admin.coupon.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Coupon $coupon)
    {
        return view('admin.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CouponValidation $request, Coupon $coupon)
    {
        $requestData = $request->all();    
        $coupon->update($requestData);

        return redirect('admin/coupon')->with('flash_message', 'Coupon updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect('admin/coupon')->with('flash_message', 'Coupon deleted!');
    }
}
