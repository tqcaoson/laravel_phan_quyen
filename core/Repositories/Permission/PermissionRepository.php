<?php

namespace Core\Repositories\Permission;

use Spatie\Permission\Models\Permission;
use DB;

class PermissionRepository implements PermissionRepositoryContract
{
    protected $model;

    public function __construct(Permission $model)
    {
        return $this->model = $model;
    }

    public function all() 
    {
        return $this->model->all();
    }

    public function byRoleShow($id) 
    {
        return $this->model->join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
    }

    public function byRoleEdit($id) 
    {
        return DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();
    }

    public function paginate()
    {
        return $this->model->latest()->paginate(5);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $model = $this->find($id);
        return $model->update($data);
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

}