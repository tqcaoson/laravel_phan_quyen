<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Core\Services\Role\RoleServiceContract;
use Core\Services\User\UserServiceContract;
use App\Http\Requests\User\EditUserRequest;
use App\Http\Requests\User\CreateUserRequest;

class UserController extends Controller
{
    protected $serviceRole;
    protected $serviceUser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(RoleServiceContract $serviceRole, UserServiceContract $serviceUser)
    {
         $this->middleware('permission:user-list');
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
         $this->serviceRole = $serviceRole;
         $this->serviceUser = $serviceUser;
    }

    public function index(Request $request)
    {
        $data = $this->serviceUser->paginate();
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->serviceRole->pluckName();
        return view('users.create',compact('roles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $this->serviceUser->store($request->only([
            'name', 
            'email',
            'password',
            'roles'
        ]));

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->serviceUser->find($id);
        return view('users.show',compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->serviceUser->find($id);
        $roles = $this->serviceRole->pluckName();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        $this->serviceUser->update($id, $request->only([
            'name', 
            'password',
            'roles'
        ]));

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->serviceUser->destroy($id);
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}