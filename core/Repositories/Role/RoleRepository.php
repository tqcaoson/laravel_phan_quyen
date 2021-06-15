<?php

namespace Core\Repositories\Role;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleRepository implements RoleRepositoryContract
{
    protected $model;

    public function __construct(Role $model)
    {
        return $this->model = $model;
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
        $role = $this->model->create(['name' => $data['name']]);
        $role->syncPermissions($data['permission']);
        return $role;
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