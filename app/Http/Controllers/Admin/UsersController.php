<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use App\Showroom;
use App\Role;
use Session;
use Hash;

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
        $perPage = 25;

        if (!empty($keyword)) {
            $users = User::where('fullname', 'LIKE', "%$keyword%")
				->orWhere('username', 'LIKE', "%$keyword%")
				->orWhere('password', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('role_id', 'LIKE', "%$keyword%")
				->orWhere('showroom_id', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $users = User::with('showroom','role')->paginate($perPage);
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
        $showrooms = Showroom::pluck('city','id');
        $roles = Role::pluck('title','id');
        return view('admin.users.create',compact('showrooms','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UserRequest $request)
    {

        $requestData = $request->all();

        $requestData['password'] =  Hash::make($requestData['password']);
        User::create($requestData);

        Session::flash('success', 'User added!');

        return redirect('admin/users');
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
        $showrooms = Showroom::pluck('city','id');
        $roles = Role::pluck('title','id');
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user','roles','showrooms'));
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
        $showrooms = Showroom::pluck('city','id');
        $roles = Role::pluck('title','id');
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user','roles','showrooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UserRequest $request)
    {
        
        $requestData = $request->all();
        
        if($request->has('password'))
        {
            $requestData['password'] =  Hash::make($requestData['password']);
        } else
        {
            unset($requestData['password']);
        }

        $user = User::findOrFail($id);
        $user->update($requestData);

        Session::flash('success', 'User updated!');

        return redirect('admin/users');
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
        User::destroy($id);

        Session::flash('success', 'User deleted!');

        return redirect('admin/users');
    }
}
