<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Core\Services\Role\RoleServiceContract;
use Core\Services\Permission\PermissionServiceContract;
use App\Http\Requests\Role\EditRoleRequest;
use App\Http\Requests\Role\CreateRoleRequest;

class RoleController extends Controller
{
    protected $serviceRole;
    protected $servicePermission;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(RoleServiceContract $serviceRole, PermissionServiceContract $servicePermission)
    {
         $this->middleware('permission:role-list');
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
         $this->serviceRole = $serviceRole;
         $this->servicePermission = $servicePermission;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = $this->serviceRole->paginate();
        $permissions = $this->servicePermission->all();
        return view('roles.index',compact(['roles', 'permissions']))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = $this->servicePermission->all();
        return view('roles.create',compact('permission'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {
        $this->serviceRole->store($request->only(['name', 'permission']));

        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = $this->serviceRole->find($id);
        $rolePermissions = $role->permissions;

        return view('roles.show',compact('role','rolePermissions'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = $this->serviceRole->find($id);
        $permission = $this->servicePermission->all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('roles.edit',compact('role','permission','rolePermissions'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRoleRequest $request, $id)
    {
        $this->serviceRole->update($id, $request->only(['name', 'permission']));

        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->serviceRole->destroy($id);
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }
}