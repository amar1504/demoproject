<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RoleValidate;
use App\Http\Requests\updateRole;
class RolesController extends Controller
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
            $roles = Role::where('role_name', 'LIKE', "%$keyword%")
                    ->latest()
                    ->paginate($perPage);
        } else {
            $roles = Role::latest()
                    ->paginate($perPage);
        }
        return view('admin.roles.index', compact('roles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.roles.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(RoleValidate $request)
    {
        $requestData = $request->all();
        $role=Role::create($requestData);
        //$role->syncPermissions($request->input('permission'));
        return redirect('admin/roles')->with('flash_message', 'Role added!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(updateRole $request, Role $role)
    {  
        $requestData = $request->all();
        $role->update($requestData);
        return redirect('admin/roles')->with('flash_message', 'Role updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Role $role)
    {
        
        $cnt=User::where('roles','=',$role->id)->count();
        if($cnt==0){
            //dd('not found');
            $role->delete();
            return redirect('admin/roles')->with('flash_message', 'Role deleted!');
        }
        else{
            //dd('found');
            return redirect('admin/roles')->with('flash_message', 'You can\'t delete this role because it is already assigned !');
        }
    }
}