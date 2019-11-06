<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Configuration;
use Illuminate\Http\Request;
use App\Http\Requests\ConfigurationManagementValidation;
class ConfigurationController extends Controller
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
            $configuration = Configuration::where('from', 'LIKE', "%$keyword%")
                        ->orWhere('subject', 'LIKE', "%$keyword%")
                        ->orWhere('body', 'LIKE', "%$keyword%")
                        ->orWhere('notification_title', 'LIKE', "%$keyword%")
                        ->latest()
                        ->paginate($perPage);
        } else {
            $configuration = Configuration::latest()->paginate($perPage);
        }

        return view('admin.configuration.index', compact('configuration'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.configuration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ConfigurationManagementValidation $request)
    {
        $requestData = $request->all();
        Configuration::create($requestData);
        return redirect('admin/configuration')->with('flash_message', 'Configuration added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Configuration $configuration)
    {
        return view('admin.configuration.show', compact('configuration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Configuration $configuration)
    {
        return view('admin.configuration.edit', compact('configuration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ConfigurationManagementValidation $request,Configuration $configuration)
    {
        $requestData = $request->all();
        $configuration->update($requestData);

        return redirect('admin/configuration')->with('flash_message', 'Configuration updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Configuration $configuration)
    {
        $configuration->delete();
        return redirect('admin/configuration')->with('flash_message', 'Configuration deleted!');
    }

    
}
