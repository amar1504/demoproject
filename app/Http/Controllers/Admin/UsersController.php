<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Role;
use App\Mail\Mailtrap;
use Auth;
use Mail;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Http\Requests\updateUser;

class UsersController extends Controller
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
            $users = User::where('firstname', 'LIKE', "%$keyword%")
                    ->orWhere('lastname', 'LIKE', "%$keyword%")
                    ->orWhere('email', 'LIKE', "%$keyword%")
                    ->orWhere('roles', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
        } else {
        
            $users = User::with('userRole')
                    ->latest()
                    ->paginate($perPage);

                    
        }

        return view('admin.users.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = DB::table('roles')->get();

        return view('admin.users.create',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreUser $request)
    {
        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                            ->store('users', 'public');
        }
        else{
            $requestData['image']="";
        }
        $requestData['password']=bcrypt($request->password);
        $user=User::create($requestData);
        $role=Role::findOrFail($user->roles);
        if ($role->role_name == 'customer') {
            $userRegisterData['email']=$request->email;
            $userRegisterData['password']=$request->password;
            $userRegisterData['flag']='cutomer registaion';
            Mail::to($request->email)->send(new Mailtrap($userRegisterData));
            $adminRegisterData['email']=$request->email;
            $adminRegisterData['flag']='cutomer registaion for admin';
            $roleAdmin=Role::where('role_name','=','superadmin')->first();
            $adminUser=User::where('roles','=',$roleAdmin->id)->first();
            Mail::to($adminUser->email)->send(new Mailtrap($adminRegisterData));

            return redirect('eshopper')->with('flash_message', 'customer added!');            
        }
        else{
            return redirect('admin/users')->with('flash_message', 'User added!');
        }

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
        $user = User::with('userRole')  
                ->findOrFail($id); 

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        $roles = DB::table('roles')->get();
        return view('admin.users.edit', compact('user'),['roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(updateUser $request,User $user)
    {
        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                        ->store('users', 'public');
        }
        $requestData['password']=bcrypt($request->password);

        $user->update($requestData);

        return redirect('admin/users')->with('flash_message', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('admin/users')->with('flash_message', 'User deleted!');
    }
}
